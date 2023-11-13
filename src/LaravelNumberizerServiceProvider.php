<?php

namespace MarJose123\LaravelNumberizer;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use MarJose123\LaravelNumberizer\Commands\LaravelNumberizerCommand;

class LaravelNumberizerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-numberizer')
            ->hasConfigFile()
            ->hasMigration('create_laravel-numberizer_table')
            ;
    }
}
