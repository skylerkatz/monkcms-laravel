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
    [Find::CATEGORIES, 'love&&healing', 'find_category_%3A_love%26%26healing'],
    [Find::CATEGORIES, 'love||healing', 'find_category_%3A_love%7C%7Chealing'],
    [Find::CATEGORIES, ['love', 'healing'], 'find_category_%3A_love%2Chealing'],

    [Find::GROUP, 'parents', 'find_group_%3A_parents'],
    [Find::GROUPS, 'parents,singles', 'find_group_%3A_parents%2Csingles'],
    [Find::GROUPS, 'parents&&singles', 'find_group_%3A_parents%26%26singles'],
    [Find::GROUPS, 'parents||singles', 'find_group_%3A_parents%7C%7Csingles'],

    [Find::SERIES, 'current,special-guests', 'find_series_%3A_current%2Cspecial-guests'],
    [Find::SERIES, 'current&&special-guests', 'find_series_%3A_current%26%26special-guests'],
    [Find::SERIES, 'current||special-guests', 'find_series_%3A_current%7C%7Cspecial-guests'],

    [Find::YEAR, '2020', 'find_year_%3A_2020'],
]);
