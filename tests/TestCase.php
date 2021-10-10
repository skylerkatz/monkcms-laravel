<?php

declare(strict_types=1);

namespace Monkdev\MonkCms\Tests;

use Monkdev\MonkCms\MonkCmsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Monkdev\\MonkCms\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            MonkCmsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        config()->set('monkcms.site_id', 54321);
        config()->set('monkcms.site_secret', 'secret');
        /*
        include_once __DIR__.'/../database/migrations/create_monkcms-laravel_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
