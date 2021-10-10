<?php

use Monkdev\MonkCms\Api\QueryBuilder;

it('hides by types with values', function ($type, $value, $result) {
    $queryBuilder = new QueryBuilder();
    $queryBuilder->hide($type, $value);

    expect(invokeProtected($queryBuilder, 'buildQueryString'))->toContain($result);
})->with('hides');
