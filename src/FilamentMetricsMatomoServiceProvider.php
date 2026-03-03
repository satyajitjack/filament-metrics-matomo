<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentMetricsMatomoServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-metrics-matomo';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations();
    }
}
