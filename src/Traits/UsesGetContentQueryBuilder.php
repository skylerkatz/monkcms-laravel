<?php

declare(strict_types=1);

namespace Monkdev\MonkCms\Traits;

use BadMethodCallException;
use Monkdev\MonkCms\Api\QueryBuilder;

/**
 * @method static display(string $string)
 */
trait UsesGetContentQueryBuilder
{
    protected ?QueryBuilder $queryBuilder = null;

    /**
     * @template TValue
     *
     * @param string $method
     * @param array<int, TValue> $parameters
     * @return static
     */
    public static function __callStatic(string $method, array $parameters): static
    {
        return (new static())->$method(...$parameters);
    }

    /**
     * @template TValue
     *
     * @param string $method
     * @param array<int, TValue> $parameters
     * @return $this
     */
    public function __call(string $method, array $parameters): static
    {
        $builder = $this->getQueryBuilder();

        if (! method_exists($builder, $method)) {
            throw new BadMethodCallException(sprintf('Method "%s" does not exist on the query builder', $method));
        }

        if (count($parameters) === 1) {
            $parameters = $parameters[0];
        }

        $builder->$method($parameters);

        return $this;
    }

    public function get(): QueryBuilder
    {
        return $this->getQueryBuilder()->get();
    }

    protected function getQueryBuilder(): QueryBuilder
    {
        if (! $this->queryBuilder) {
            $this->queryBuilder = new QueryBuilder();

            $this->queryBuilder->module(class_basename(static::class));
        }

        return $this->queryBuilder;
    }

    /**
     * @return array<string, string|bool>
     */
    public function debugQuery(): array
    {
        return $this->getQueryBuilder()->buildQueryAsArray();
    }
}
