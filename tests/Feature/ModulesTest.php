<?php

declare(strict_types=1);

use Monkdev\MonkCms\Modules\Sermon;
use Monkdev\MonkCms\Modules\Article;

test('modules have a get method')
    ->expect(method_exists(Sermon::class, 'get'))
    ->toBeTrue();

test('modules have debugQuery method')
    ->expect(method_exists(Sermon::class, 'debugQuery'))
    ->toBeTrue();

it('sets the module dynamically')
    ->expect((new Sermon())->debugQuery())
    ->toBe(['module' => 'sermon', 'json' => true])
    ->and((new Article())->debugQuery())
    ->toBe(['module' => 'article', 'json' => true]);

it('can set a display type')
    ->expect(Sermon::display('list')->debugQuery())
    ->toBe([
        'module' => 'sermon',
        'display' => 'list',
        'json' => true,
    ]);
