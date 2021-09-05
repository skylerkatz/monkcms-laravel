<?php

use Monkdev\MonkCms\Api\QueryBuilder;

it('finds by types with values', function ($type, $value, $result) {
    $queryBuilder = new QueryBuilder();
    $queryBuilder->find($type, $value);

    expect(invokeProtected($queryBuilder, 'buildQueryString'))->toContain($result);
})->with('finds');
