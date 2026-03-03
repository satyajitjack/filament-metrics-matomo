<?php

use Illuminate\Support\Facades\Http;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoTopPagesWidget;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the top pages widget', function () {
    Http::fake([
        '*' => Http::response([
            ['label' => '/home', 'nb_visits' => 50, 'nb_uniq_visitors' => 40, 'nb_actions' => 60],
            ['label' => '/about', 'nb_visits' => 30, 'nb_uniq_visitors' => 25, 'nb_actions' => 35],
        ]),
    ]);

    livewire(MatomoTopPagesWidget::class)
        ->assertSuccessful();
});
