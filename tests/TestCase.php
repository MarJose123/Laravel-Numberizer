<?php

namespace MarJose123\LaravelNumberizer\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use MarJose123\LaravelNumberizer\LaravelNumberizerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'MarJose123\\LaravelNumberizer\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelNumberizerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-numberizer_table.php.stub';
        $migration->up();
        */
    }
}
