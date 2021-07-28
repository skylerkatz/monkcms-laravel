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

it('can find by site slug', function () {
    $queryBuilder = new QueryBuilder();
    $queryBuilder->find(Find::BY_SITE_SLUG, 'simple-site');

    expect($queryBuilder->buildQueryAsArray())->toMatchArray([
        'find_site' => 'simple-site',
    ]);

    expect(invokeProtected($queryBuilder, 'buildQueryString'))->toContain('find_site_%3A_simple-site');
});
