<?php

namespace Monkdev\MonkCms\Modules;

use Monkdev\MonkCms\Traits\UsesGetContentQueryBuilder;

abstract class Module
{
    use UsesGetContentQueryBuilder;

    /**
     * @var array<string, mixed>
     */
    protected array $response;

    final public function __construct()
    {
    }

    /**
     * @param array<string, mixed> $response
     * @return static
     */
    protected static function fromResponse(array $response) :static
    {
        $model = new static;
        $model->setResponse($response);

        return $model;
    }

    /**
     * @param array<string, mixed> $response
     * @return $this
     */
    protected function setResponse(array $response): static
    {
        $this->response = $response;

        return $this;
    }
}
