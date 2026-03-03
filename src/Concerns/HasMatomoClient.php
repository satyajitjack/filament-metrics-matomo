<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Concerns;

use Illuminate\Support\Facades\Cache;
use JeffersonGoncalves\MetricsMatomo\Matomo;
use JeffersonGoncalves\MetricsMatomo\Settings\MatomoSettings;

trait HasMatomoClient
{
    protected function getMatomo(): Matomo
    {
        return app(Matomo::class);
    }

    protected function isConfigured(): bool
    {
        try {
            $settings = app(MatomoSettings::class);

            return $settings->base_url !== ''
                && $settings->api_token !== ''
                && $settings->site_id > 0;
        } catch (\Throwable) {
            return false;
        }
    }

    protected function cachedCall(string $key, \Closure $callback): mixed
    {
        if (! $this->isConfigured()) {
            return null;
        }

        $ttl = (int) config('filament-metrics-matomo.cache_ttl', 300);
        $store = config('filament-metrics-matomo.cache_store');

        try {
            $cache = $store ? Cache::store($store) : Cache::store();

            if ($ttl <= 0) {
                return $callback();
            }

            return $cache->remember(
                "filament-metrics-matomo:{$key}",
                $ttl,
                $callback
            );
        } catch (\Throwable) {
            return null;
        }
    }

    protected function clearCache(string $key): void
    {
        $store = config('filament-metrics-matomo.cache_store');
        $cache = $store ? Cache::store($store) : Cache::store();

        $cache->forget("filament-metrics-matomo:{$key}");
    }
}
