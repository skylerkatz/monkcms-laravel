<?php

use Monkdev\MonkCms\Api\Find;
use Monkdev\MonkCms\Api\QueryBuilder;

it('can find by id', function () {
    $queryBuilder = new QueryBuilder();
    $queryBuilder->find(Find::BY_ID, 1);

    expect($queryBuilder->buildQueryAsArray())->toMatchArray([
        'find' => 1,
    ]);

    expect(invokeProtected($queryBuilder, 'buildQueryString'))->toContain('find_%3A_1');
});
