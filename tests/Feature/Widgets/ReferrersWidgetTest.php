<?php

use Illuminate\Support\Facades\Http;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoReferrersWidget;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the referrers widget', function () {
    Http::fake([
        '*' => Http::response([
            ['label' => 'Direct Entry', 'nb_visits' => 50, 'nb_uniq_visitors' => 40, 'nb_actions' => 60],
            ['label' => 'Search Engines', 'nb_visits' => 30, 'nb_uniq_visitors' => 25, 'nb_actions' => 35],
        ]),
    ]);

    livewire(MatomoReferrersWidget::class)
        ->assertSuccessful();
});
