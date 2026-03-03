<?php

use JeffersonGoncalves\FilamentMetricsMatomo\FilamentMetricsMatomoPlugin;

it('can enable settings page', function () {
    $plugin = FilamentMetricsMatomoPlugin::make()->settingsPage();

    expect($plugin->hasSettingsPage())->toBeTrue();
});

it('can disable settings page', function () {
    $plugin = FilamentMetricsMatomoPlugin::make()->settingsPage(false);

    expect($plugin->hasSettingsPage())->toBeFalse();
});

it('can enable all widgets', function () {
    $plugin = FilamentMetricsMatomoPlugin::make()->allWidgets();

    expect($plugin->hasLiveCounter())->toBeTrue()
        ->and($plugin->hasVisitsSummary())->toBeTrue()
        ->and($plugin->hasVisitsChart())->toBeTrue()
        ->and($plugin->hasTopPages())->toBeTrue()
        ->and($plugin->hasReferrers())->toBeTrue()
        ->and($plugin->hasDeviceTypes())->toBeTrue()
        ->and($plugin->hasBrowsers())->toBeTrue()
        ->and($plugin->hasCountries())->toBeTrue();
});

it('can disable all widgets', function () {
    $plugin = FilamentMetricsMatomoPlugin::make()->allWidgets(false);

    expect($plugin->hasLiveCounter())->toBeFalse()
        ->and($plugin->hasVisitsSummary())->toBeFalse()
        ->and($plugin->hasVisitsChart())->toBeFalse()
        ->and($plugin->hasTopPages())->toBeFalse()
        ->and($plugin->hasReferrers())->toBeFalse()
        ->and($plugin->hasDeviceTypes())->toBeFalse()
        ->and($plugin->hasBrowsers())->toBeFalse()
        ->and($plugin->hasCountries())->toBeFalse();
});

it('can enable individual widgets', function () {
    $plugin = FilamentMetricsMatomoPlugin::make()
        ->liveCounter()
        ->visitsSummary()
        ->countries(false);

    expect($plugin->hasLiveCounter())->toBeTrue()
        ->and($plugin->hasVisitsSummary())->toBeTrue()
        ->and($plugin->hasCountries())->toBeFalse()
        ->and($plugin->hasVisitsChart())->toBeFalse();
});

it('has correct plugin id', function () {
    $plugin = FilamentMetricsMatomoPlugin::make();

    expect($plugin->getId())->toBe('filament-metrics-matomo');
});

it('supports fluent chaining', function () {
    $plugin = FilamentMetricsMatomoPlugin::make()
        ->settingsPage()
        ->liveCounter()
        ->visitsSummary()
        ->visitsChart()
        ->topPages()
        ->referrers()
        ->deviceTypes()
        ->browsers()
        ->countries();

    expect($plugin)->toBeInstanceOf(FilamentMetricsMatomoPlugin::class)
        ->and($plugin->hasSettingsPage())->toBeTrue()
        ->and($plugin->hasLiveCounter())->toBeTrue();
});
