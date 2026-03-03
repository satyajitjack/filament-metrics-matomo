<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Concerns;

use JeffersonGoncalves\MetricsMatomo\Enums\Period;

trait HasPeriodFilter
{
    public string $period = '';

    public function mountHasPeriodFilter(): void
    {
        $this->period = config('filament-metrics-matomo.default_period', 'day');
    }

    protected function getSelectedPeriod(): Period
    {
        return Period::tryFrom($this->period) ?? Period::Day;
    }

    /**
     * @return array<string, string>
     */
    protected function getPeriodOptions(): array
    {
        return [
            'day' => __('filament-metrics-matomo::widgets.periods.day'),
            'week' => __('filament-metrics-matomo::widgets.periods.week'),
            'month' => __('filament-metrics-matomo::widgets.periods.month'),
            'year' => __('filament-metrics-matomo::widgets.periods.year'),
        ];
    }
}
