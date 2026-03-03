<x-filament-widgets::widget>
    <x-filament::section :heading="$heading" :icon="$icon">
        @if ($error)
            <div class="text-sm text-danger-600 dark:text-danger-400">
                {{ $error }}
            </div>
        @elseif (empty($rows))
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ __('filament-metrics-matomo::widgets.not_configured') }}
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full table-auto divide-y divide-gray-200 dark:divide-white/5">
                    <thead>
                        <tr>
                            @foreach ($columns as $column)
                                <th class="px-3 py-2 text-start text-xs font-medium text-gray-500 dark:text-gray-400 {{ $loop->first ? '' : 'text-end' }}">
                                    {{ $column }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-white/5">
                        @foreach ($rows as $row)
                            <tr>
                                @foreach ($row as $value)
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-950 dark:text-white {{ $loop->first ? '' : 'text-end' }}">
                                        {{ $value }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
