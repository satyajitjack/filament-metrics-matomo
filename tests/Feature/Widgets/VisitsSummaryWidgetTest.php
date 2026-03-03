<?php

use Illuminate\Support\Facades\Http;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoVisitsSummaryWidget;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the visits summary widget', function () {
    Http::fake([
        '*' => Http::response([
            'nb_visits' => 100,
            'nb_uniq_visitors' => 80,
            'nb_actions' => 500,
            'nb_users' => 50,
            'bounce_count' => 20,
            'bounce_rate' => '20%',
            'sum_visit_length' => 3600,
            'max_actions' => 10,
            'nb_actions_per_visit' => 5.0,
            'avg_time_on_site' => 120,
        ]),
    ]);

    livewire(MatomoVisitsSummaryWidget::class)
        ->assertSuccessful();
});
