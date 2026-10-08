<?php

use JeffersonGoncalves\CloudflareWebAnalytics\Settings\CloudflareWebAnalyticsSettings;
use JeffersonGoncalves\CloudflareWebAnalytics\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

/**
 * Saves the given values on top of the stored Cloudflare Web Analytics settings.
 *
 * @param  array<string, mixed>  $values
 */
function cloudflare_web_analytics(array $values): CloudflareWebAnalyticsSettings
{
    $settings = app(CloudflareWebAnalyticsSettings::class);
    foreach ($values as $name => $value) {
        $settings->{$name} = $value;
    }
    $settings->save();

    return $settings;
}
