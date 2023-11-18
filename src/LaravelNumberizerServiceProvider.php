<?php

namespace MarJose123\LaravelNumberizer;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasMigrations(['create_numberizer_table']);
    }
}
