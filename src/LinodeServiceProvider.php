<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LinodeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('linode')
            ->hasConfigFile();
    }
}
