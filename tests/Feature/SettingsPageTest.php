<?php

use JeffersonGoncalves\FilamentMetricsMatomo\Pages\MatomoSettingsPage;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(createTestUser());
});

it('can render the settings page', function () {
    livewire(MatomoSettingsPage::class)
        ->assertSuccessful();
});

it('has the correct form fields', function () {
    livewire(MatomoSettingsPage::class)
        ->assertFormFieldExists('base_url')
        ->assertFormFieldExists('api_token')
        ->assertFormFieldExists('site_id')
        ->assertFormFieldExists('timezone');
});

it('can save settings', function () {
    livewire(MatomoSettingsPage::class)
        ->fillForm([
            'base_url' => 'https://new-matomo.example.com',
            'api_token' => 'new-test-token',
            'site_id' => 2,
            'timezone' => 'America/Sao_Paulo',
        ])
        ->call('save')
        ->assertHasNoFormErrors();
});

it('requires base_url', function () {
    livewire(MatomoSettingsPage::class)
        ->fillForm([
            'base_url' => '',
        ])
        ->call('save')
        ->assertHasFormErrors(['base_url' => 'required']);
});

it('requires api_token', function () {
    livewire(MatomoSettingsPage::class)
        ->fillForm([
            'api_token' => '',
        ])
        ->call('save')
        ->assertHasFormErrors(['api_token' => 'required']);
});

it('requires site_id', function () {
    livewire(MatomoSettingsPage::class)
        ->fillForm([
            'site_id' => null,
        ])
        ->call('save')
        ->assertHasFormErrors(['site_id' => 'required']);
});

it('validates base_url as url', function () {
    livewire(MatomoSettingsPage::class)
        ->fillForm([
            'base_url' => 'not-a-url',
        ])
        ->call('save')
        ->assertHasFormErrors(['base_url' => 'url']);
});
