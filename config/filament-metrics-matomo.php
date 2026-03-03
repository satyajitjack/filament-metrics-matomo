<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Period
    |--------------------------------------------------------------------------
    |
    | The default period used for Matomo API queries.
    | Supported: "day", "week", "month", "year"
    |
    */

    'default_period' => 'day',

    /*
    |--------------------------------------------------------------------------
    | Cache TTL
    |--------------------------------------------------------------------------
    |
    | How long (in seconds) to cache Matomo API responses.
    | Set to 0 to disable caching.
    |
    */

    'cache_ttl' => 300,

    /*
    |--------------------------------------------------------------------------
    | Cache Store
    |--------------------------------------------------------------------------
    |
    | The cache store to use. Set to null to use the default store.
    |
    */

    'cache_store' => null,

    /*
    |--------------------------------------------------------------------------
    | Live Counter Poll Interval
    |--------------------------------------------------------------------------
    |
    | How often (in seconds) the live counter widget should poll for updates.
    |
    */

    'live_counter_poll_interval' => 30,

    /*
    |--------------------------------------------------------------------------
    | Live Counter Last Minutes
    |--------------------------------------------------------------------------
    |
    | The number of minutes to look back for live counter data.
    |
    */

    'live_counter_last_minutes' => 30,

    /*
    |--------------------------------------------------------------------------
    | Table Row Limit
    |--------------------------------------------------------------------------
    |
    | Default number of rows to show in table widgets.
    |
    */

    'table_row_limit' => 10,

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    |
    | Configure the navigation group and sort order for the settings page.
    |
    */

    'navigation' => [
        'group' => 'Analytics',
        'sort' => null,
    ],

];
