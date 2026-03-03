<?php

return [

    'settings' => [
        'title' => 'Configurações do Matomo',
        'navigation_label' => 'Matomo',

        'sections' => [
            'connection' => 'Conexão',
            'connection_description' => 'Configure os detalhes de conexão com sua instância do Matomo.',
        ],

        'fields' => [
            'base_url' => 'URL do Matomo',
            'base_url_placeholder' => 'https://matomo.exemplo.com',
            'base_url_helper' => 'A URL base da sua instalação do Matomo.',
            'api_token' => 'Token da API',
            'api_token_helper' => 'Você pode encontrar seu token no Matomo em Configurações > Pessoal > Segurança.',
            'site_id' => 'ID do Site',
            'site_id_helper' => 'O ID numérico do site que deseja monitorar.',
            'timezone' => 'Fuso Horário',
            'timezone_placeholder' => 'Selecione um fuso horário...',
        ],

        'actions' => [
            'test_connection' => 'Testar Conexão',
        ],

        'notifications' => [
            'saved' => 'Configurações do Matomo salvas com sucesso.',
            'test_success' => 'Conexão bem-sucedida! O Matomo está acessível.',
            'test_failure' => 'Falha na conexão. Verifique suas configurações.',
            'cache_cleared' => 'Cache do Matomo limpo.',
        ],
    ],

];
