<?php

namespace SamuelMwangiW\Linode;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SamuelMwangiW\Linode\Commands\LinodeCliCommand;

class LinodeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('linode')
            ->hasConfigFile();
    }
}
