<?php

declare(strict_types=1);

namespace Monkdev\MonkCms\Api;

use Throwable;
use JsonException;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Monkdev\MonkCms\Exceptions\QueryBuilderException;
use Monkdev\MonkCms\Exceptions\SiteNotFoundException;
use Monkdev\MonkCms\Exceptions\UnprocessableApiResponseException;

class QueryBuilder
{
    private ?string $display = null;
    /**
     * @var array<string, string>
     */
    private array $finds = [];

    /**
     * @var array<string, string>
     */
    private array $hides = [];

    private ?string $module = null;

    public function get(): static
    {
        return $this;
    }

    /**
     * @param string|null $type
     * @param string|array<int, string> $value
     * @return array<string, string>
     */
    public function find(?string $type = null, string | array $value = ''): array
    {
        return $this->filter(Find::class, $type, $value);
    }

    /**
     * @param string|null $type
     * @param string|array<int, string> $value
     * @return array<string, string>
     */
    public function hide(?string $type = null, string | array $value = ''): array
    {
        return $this->filter(Hide::class, $type, $value);
    }

    /**
     * @param string $filter
     * @param string|null $type
     * @param string|array<int, string> $value
     * @return array<string, string>
     */
    protected function filter(string $filter, ?string $type = null, string | array $value = ''): array
    {
        if (! in_array($filter, [Hide::class, Find::class])) {
            throw new QueryBuilderException("Invalid Filter Type $filter");
        }

        $filter = Str::plural(strtolower(class_basename($filter)));

        if (! $type) {
            return $this->$filter;
        }

        $values = is_string($value) ? explode(',', $value) : $value;

        if ($this->shouldBeSluggified($type)) {
            $values = array_map(fn ($value) => Str::slug($value), $values);
        }

        $this->$filter[$type] = implode(',', $values);

        return $this->$filter;
    }

    public function module(?string $module = null): ?string
    {
        if ($module) {
            $this->module = strtolower($module);
        }

        return $this->module;
    }

    public function display(?string $type = null): ?string
    {
        if ($type) {
            $this->display = $type;
        }

        return $this->display;
    }

    /**
     * @return array<string, string|bool>
     */
    public function buildQueryAsArray(): array
    {
        $query = array_filter([
            'module' => $this->module(),
            'display' => $this->display(),
            'json' => true,
        ]);

        foreach ($this->find() as $type => $value) {
            $query[$type] = $value;
        }

        foreach ($this->hide() as $type => $value) {
            $query[$type] = $value;
        }

        return $query;
    }

    protected function buildQueryString(): string
    {
        return http_build_query(
            array_merge([
                'SITEID' => Config::get('monkcms.site_id'),
                'CMSCODE' => Config::get('monkcms.cms_code'),
                'CMSTYPE' => Config::get('monkcms.cms_type'),
                'NR' => count($this->buildQueryAsArray()),
            ], $this->formatQueryForApi())
        );
    }

    protected function buildRequestUrl(): string
    {
        return sprintf(
            '%s/Clients/ekkContent.php?%s',
            Config::get('monkcms.api_url'),
            $this->buildQueryString()
        );
    }

    /**
     * @return array<string, string>
     */
    protected function processResponse(string $response): array
    {
        try {
            return json_decode(substr($response, 10), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            throw new UnprocessableApiResponseException(
                "The api response was unable to be processed: $response"
            );
        }
    }

    /**
     * @throws Throwable
     */
    protected function makeRequest(): string
    {
        throw_unless(
            Config::get('monkcms.site_id') && Config::get('monkcms.site_secret'),
            AuthenticationException::class
        );

        $response = Http::withBasicAuth(
            Config::get('monkcms.site_id'),
            Config::get('monkcms.site_secret')
        )->get($this->buildRequestUrl());

        throw_if(
            $response->status() === Response::HTTP_UNAUTHORIZED,
            AuthenticationException::class
        );

        throw_if(
            $response->status() === Response::HTTP_NOT_FOUND,
            SiteNotFoundException::class,
            sprintf(
                'The site with an id of \'%s\' does not exist',
                Config::get('monkcms.site_id')
            )
        );

        return $response->throw()->body();
    }

    /**
     * @return array<string, string>
     */
    protected function formatQueryForApi(): array
    {
        return Collection::make($this->buildQueryAsArray())
            ->map(function ($value, $key) {
                $key = Str::replace(
                    [Find::BOOK_AUTHOR, Find::GEOGRAPHICAL_LOCATION, Find::JOB_LOCATION],
                    [Find::AUTHOR, Find::LOCATION, Find::LOCATION],
                    $key
                );

                if ($key === 'module') {
                    return $value;
                }

                if ($value === true) {
                    return $key;
                }

                return sprintf('%s_:_%s', $key, $value);
            })
            ->values()
            ->mapWithKeys(fn ($value, $key) => ["arg$key" => $value])
            ->toArray();
    }

    protected function shouldBeSluggified(string $type): bool
    {
        return in_array($type, array_merge(Find::sluggableFinds(), Hide::sluggableHides()), true);
    }
}
