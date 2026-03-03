<?php

use JeffersonGoncalves\FilamentMetricsMatomo\Tests\Fixtures\TestUser;
use JeffersonGoncalves\FilamentMetricsMatomo\Tests\TestCase;

uses(TestCase::class)->in('Feature', 'Unit');

function createTestUser(): TestUser
{
    return TestUser::factory()->create();
}
