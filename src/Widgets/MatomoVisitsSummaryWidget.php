<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasMatomoClient;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasPeriodFilter;

class MatomoVisitsSummaryWidget extends StatsOverviewWidget
{
    use HasMatomoClient;
    use HasPeriodFilter;

    protected static ?int $sort = -2;

    protected function getHeading(): ?string
    {
        return __('filament-metrics-matomo::widgets.visits_summary.heading');
    }

    /**
     * @return array<Stat>
     */
    protected function getStats(): array
    {
        if (! $this->isConfigured()) {
            return [
                Stat::make(
                    __('filament-metrics-matomo::widgets.visits_summary.visitors'),
                    __('filament-metrics-matomo::widgets.not_configured')
                ),
            ];
        }

        $period = $this->getSelectedPeriod();

        $summary = $this->cachedCall("visits-summary-{$period->value}", function () use ($period) {
            return $this->getMatomo()->visitsSummary($period)->toArray();
        });

        if ($summary === null) {
            return [
                Stat::make(
                    __('filament-metrics-matomo::widgets.visits_summary.visitors'),
                    __('filament-metrics-matomo::widgets.error')
                ),
            ];
        }

        $avgDuration = isset($summary['avgTimeOnSite'])
            ? gmdate('i:s', (int) $summary['avgTimeOnSite'])
            : '00:00';

        $bounceRate = isset($summary['bounceRate'])
            ? number_format($summary['bounceRate'], 1).'%'
            : '0%';

        return [
            Stat::make(
                __('filament-metrics-matomo::widgets.visits_summary.visitors'),
                number_format($summary['nbUniqVisitors'] ?? 0)
            )->icon('heroicon-o-users'),
            Stat::make(
                __('filament-metrics-matomo::widgets.visits_summary.visits'),
                number_format($summary['nbVisits'] ?? 0)
            )->icon('heroicon-o-cursor-arrow-rays'),
            Stat::make(
                __('filament-metrics-matomo::widgets.visits_summary.pageviews'),
                number_format($summary['nbActions'] ?? 0)
            )->icon('heroicon-o-document-text'),
            Stat::make(
                __('filament-metrics-matomo::widgets.visits_summary.bounce_rate'),
                $bounceRate
            )->icon('heroicon-o-arrow-uturn-left'),
            Stat::make(
                __('filament-metrics-matomo::widgets.visits_summary.avg_duration'),
                $avgDuration
            )->icon('heroicon-o-clock'),
            Stat::make(
                __('filament-metrics-matomo::widgets.visits_summary.actions_per_visit'),
                number_format($summary['nbActionsPerVisit'] ?? 0, 1)
            )->icon('heroicon-o-hand-raised'),
        ];
    }
}
