<?php

use Illuminate\Support\Facades\Http;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoDeviceTypesWidget;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the device types widget', function () {
    Http::fake([
        '*' => Http::response([
            ['label' => 'Desktop', 'nb_visits' => 60, 'nb_uniq_visitors' => 50, 'nb_actions' => 70],
            ['label' => 'Smartphone', 'nb_visits' => 30, 'nb_uniq_visitors' => 25, 'nb_actions' => 35],
        ]),
    ]);

    livewire(MatomoDeviceTypesWidget::class)
        ->assertSuccessful();
});
