<?php

return [

    'settings' => [
        'title' => 'Matomo Settings',
        'navigation_label' => 'Matomo',

        'sections' => [
            'connection' => 'Connection',
            'connection_description' => 'Configure your Matomo instance connection details.',
        ],

        'fields' => [
            'base_url' => 'Matomo URL',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'The base URL of your Matomo installation.',
            'api_token' => 'API Token',
            'api_token_helper' => 'You can find your token in Matomo under Settings > Personal > Security.',
            'site_id' => 'Site ID',
            'site_id_helper' => 'The numeric ID of the site you want to track.',
            'timezone' => 'Timezone',
            'timezone_placeholder' => 'Select a timezone...',
        ],

        'actions' => [
            'test_connection' => 'Test Connection',
        ],

        'notifications' => [
            'saved' => 'Matomo settings saved successfully.',
            'test_success' => 'Connection successful! Matomo is reachable.',
            'test_failure' => 'Connection failed. Please check your settings.',
            'cache_cleared' => 'Matomo cache cleared.',
        ],
    ],

];
