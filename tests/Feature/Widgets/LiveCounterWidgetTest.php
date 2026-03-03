<?php

use Illuminate\Support\Facades\Http;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoLiveCounterWidget;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the live counter widget', function () {
    Http::fake([
        '*' => Http::response([
            [
                'visits' => 10,
                'actions' => 25,
                'visitors' => 8,
                'visitsConverted' => 2,
            ],
        ]),
    ]);

    livewire(MatomoLiveCounterWidget::class)
        ->assertSuccessful();
});

it('shows not configured message when matomo is not configured', function () {
    // Clear settings to simulate unconfigured state
    \Illuminate\Support\Facades\DB::table('settings')
        ->where('group', 'metrics-matomo')
        ->where('name', 'base_url')
        ->update(['payload' => json_encode('')]);

    \Illuminate\Support\Facades\DB::table('settings')
        ->where('group', 'metrics-matomo')
        ->where('name', 'api_token')
        ->update(['payload' => json_encode('')]);

    // Clear cached settings
    app()->forgetInstance(\JeffersonGoncalves\MetricsMatomo\Settings\MatomoSettings::class);

    livewire(MatomoLiveCounterWidget::class)
        ->assertSee(__('filament-metrics-matomo::widgets.not_configured'));
});
