<?php

use JeffersonGoncalves\FilamentMetricsMatomo\FilamentMetricsMatomoPlugin;

it('registers the plugin in the panel', function () {
    $plugin = filament()->getCurrentPanel()?->getPlugin('filament-metrics-matomo');

    expect($plugin)->toBeInstanceOf(FilamentMetricsMatomoPlugin::class);
});

it('has the correct plugin id', function () {
    $plugin = filament()->getCurrentPanel()?->getPlugin('filament-metrics-matomo');

    expect($plugin->getId())->toBe('filament-metrics-matomo');
});
