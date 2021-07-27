<?php

use Monkdev\MonkCms\Modules\Sermon;
use Monkdev\MonkCms\Modules\Article;

test('modules have a get method', function () {
    expect(method_exists(Sermon::class, 'get'))->toBeTrue();
});

test('modules have debugQuery method', function () {
    expect(method_exists(Sermon::class, 'debugQuery'))->toBeTrue();
});

it('sets the module dynamically', function () {
    expect((new Sermon())->debugQuery())->toBe(['module' => 'sermon', 'json' => true]);
    expect((new Article())->debugQuery())->toBe(['module' => 'article', 'json' => true]);
});

it('can set a display type', function () {
    expect(Sermon::display('list')->debugQuery())->toBe([
        'module' => 'sermon',
        'display' => 'list',
        'json' => true,
    ]);
});
