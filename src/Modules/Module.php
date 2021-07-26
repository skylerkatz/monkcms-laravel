<?php

namespace Monkdev\MonkCms\Modules;

use Monkdev\MonkCms\Traits\UsesGetContentQueryBuilder;

abstract class Module
{
    use UsesGetContentQueryBuilder;

    protected array $response;

    protected static function fromResponse($response) :static
    {
        $model = new static;
        $model->setResponse($response);

        return $model;
    }

    protected function setResponse(array $response): static
    {
        $this->response = $response;

        return $this;
    }
}
