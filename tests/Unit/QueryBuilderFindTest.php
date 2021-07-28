<?php

use Monkdev\MonkCms\Api\Find;
use Monkdev\MonkCms\Api\QueryBuilder;

it('finds by types with values', function ($type, $value, $result) {
    $queryBuilder = new QueryBuilder();
    $queryBuilder->find($type, $value);

    expect(invokeProtected($queryBuilder, 'buildQueryString'))->toContain($result);
})->with([
    [Find::BY_ID, '1', 'find_%3A_1'],

    [Find::BY_SITE_SLUG, 'simple-site', 'find_site_%3A_simple-site'],

    [Find::CATEGORY, 'love', 'find_category_%3A_love'],
    [Find::CATEGORIES, 'love,healing', 'find_category_%3A_love%2Chealing'],
    [Find::CATEGORIES, ['love', 'healing'], 'find_category_%3A_love%2Chealing'],
]);
