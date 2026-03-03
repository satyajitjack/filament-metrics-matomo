<?php

use Illuminate\Support\Facades\Http;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoVisitsChartWidget;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the visits chart widget', function () {
    Http::fake([
        '*' => Http::response([
            '2026-02-01' => ['nb_visits' => 10, 'nb_uniq_visitors' => 8],
            '2026-02-02' => ['nb_visits' => 15, 'nb_uniq_visitors' => 12],
            '2026-02-03' => ['nb_visits' => 20, 'nb_uniq_visitors' => 16],
        ]),
    ]);

    livewire(MatomoVisitsChartWidget::class)
        ->assertSuccessful();
});
