<?php

use Illuminate\Support\Facades\Http;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoCountriesWidget;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the countries widget', function () {
    Http::fake([
        '*' => Http::response([
            ['label' => 'Brazil', 'nb_visits' => 50, 'nb_uniq_visitors' => 40, 'nb_actions' => 60],
            ['label' => 'United States', 'nb_visits' => 30, 'nb_uniq_visitors' => 25, 'nb_actions' => 35],
        ]),
    ]);

    livewire(MatomoCountriesWidget::class)
        ->assertSuccessful();
});
