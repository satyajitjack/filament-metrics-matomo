<?php

use Illuminate\Support\Facades\Http;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoBrowsersWidget;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the browsers widget', function () {
    Http::fake([
        '*' => Http::response([
            ['label' => 'Chrome', 'nb_visits' => 60, 'nb_uniq_visitors' => 50, 'nb_actions' => 70],
            ['label' => 'Firefox', 'nb_visits' => 30, 'nb_uniq_visitors' => 25, 'nb_actions' => 35],
        ]),
    ]);

    livewire(MatomoBrowsersWidget::class)
        ->assertSuccessful();
});
