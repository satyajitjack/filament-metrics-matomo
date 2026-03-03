<x-filament-widgets::widget>
    <x-filament::section :heading="__('filament-metrics-matomo::widgets.live_counter.heading')" icon="heroicon-o-signal">
        @if ($error)
            <div class="text-sm text-danger-600 dark:text-danger-400">
                {{ $error }}
            </div>
        @elseif ($data)
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                {{-- Visitors --}}
                <div class="flex flex-col items-center gap-1 rounded-lg bg-gray-50 p-3 dark:bg-white/5">
                    <div class="flex items-center gap-1.5">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-success-400 opacity-75"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-success-500"></span>
                        </span>
                        <span class="text-2xl font-bold text-gray-950 dark:text-white">
                            {{ $data['visitors'] }}
                        </span>
                    </div>
                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        {{ __('filament-metrics-matomo::widgets.live_counter.visitors') }}
                    </span>
                </div>

                {{-- Visits --}}
                <div class="flex flex-col items-center gap-1 rounded-lg bg-gray-50 p-3 dark:bg-white/5">
                    <span class="text-2xl font-bold text-gray-950 dark:text-white">
                        {{ $data['visits'] }}
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        {{ __('filament-metrics-matomo::widgets.live_counter.visits') }}
                    </span>
                </div>

                {{-- Actions --}}
                <div class="flex flex-col items-center gap-1 rounded-lg bg-gray-50 p-3 dark:bg-white/5">
                    <span class="text-2xl font-bold text-gray-950 dark:text-white">
                        {{ $data['actions'] }}
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        {{ __('filament-metrics-matomo::widgets.live_counter.actions') }}
                    </span>
                </div>

                {{-- Conversions --}}
                <div class="flex flex-col items-center gap-1 rounded-lg bg-gray-50 p-3 dark:bg-white/5">
                    <span class="text-2xl font-bold text-gray-950 dark:text-white">
                        {{ $data['visits_converted'] }}
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        {{ __('filament-metrics-matomo::widgets.live_counter.conversions') }}
                    </span>
                </div>
            </div>

            <p class="mt-2 text-center text-xs text-gray-400 dark:text-gray-500">
                {{ __('filament-metrics-matomo::widgets.live_counter.last_minutes', ['minutes' => $lastMinutes]) }}
            </p>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
