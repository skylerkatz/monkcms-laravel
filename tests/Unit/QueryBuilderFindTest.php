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

    [Find::PARENT_CATEGORY, 'fruits-of-the-spirit', 'find_parent_category_%3A_fruits-of-the-spirit'],
    [Find::PARENT_CATEGORIES, 'fruits-of-the-spirit,special-events', 'find_parent_category_%3A_fruits-of-the-spirit%2Cspecial-events'],
    [Find::PARENT_CATEGORIES, 'fruits-of-the-spirit&&special-events', 'find_parent_category_%3A_fruits-of-the-spirit%26%26special-events'],
    [Find::PARENT_CATEGORIES, 'fruits-of-the-spirit||special-events', 'find_parent_category_%3A_fruits-of-the-spirit%7C%7Cspecial-events'],
    [Find::PARENT_CATEGORIES, ['fruits-of-the-spirit', 'special-events'], 'find_parent_category_%3A_fruits-of-the-spirit%2Cspecial-events'],

    [Find::GROUP, 'parents', 'find_group_%3A_parents'],
    [Find::GROUPS, 'parents,singles', 'find_group_%3A_parents%2Csingles'],
    [Find::GROUPS, 'parents&&singles', 'find_group_%3A_parents%26%26singles'],
    [Find::GROUPS, 'parents||singles', 'find_group_%3A_parents%7C%7Csingles'],

    [Find::SERIES, 'current,special-guests', 'find_series_%3A_current%2Cspecial-guests'],
    [Find::SERIES, 'current&&special-guests', 'find_series_%3A_current%26%26special-guests'],
    [Find::SERIES, 'current||special-guests', 'find_series_%3A_current%7C%7Cspecial-guests'],

    [Find::YEAR, '2020', 'find_year_%3A_2020'],
    [Find::MONTH, '11-2020', 'find_month_%3A_11-2020'],

    [Find::PREACHER, 'frank-de-monk', 'find_preacher_%3A_frank-de-monk'],
    [Find::PREACHERS, 'frank-de-monk,monkbot', 'find_preacher_%3A_frank-de-monk%2Cmonkbot'],

    [Find::BIBLE_PASSAGE, 'Romans', 'find_passage_%3A_Romans'],
    [Find::BIBLE_PASSAGE, '1-Corinthians', 'find_passage_%3A_1-Corinthians'],
    [Find::BIBLE_PASSAGE, '1 Corinthians 5:1-6:13', 'find_passage_%3A_1+Corinthians+5%3A1-6%3A13'],
]);
