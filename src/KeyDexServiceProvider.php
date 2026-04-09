<?php

namespace codearachnid\KeyDex;

use codearachnid\KeyDex\Commands\KeyDexCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class KeyDexServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('keydex')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_keydex_table')
            ->hasCommand(KeyDexCommand::class);
    }
}
