<?php

use JeffersonGoncalves\CloudflareWebAnalytics\Facades\CloudflareWebAnalytics;
use JeffersonGoncalves\CloudflareWebAnalytics\Settings\CloudflareWebAnalyticsSettings;

it('can resolve CloudflareWebAnalyticsSettings from the container', function () {
    expect(app(CloudflareWebAnalyticsSettings::class))->toBeInstanceOf(CloudflareWebAnalyticsSettings::class);
});

it('is not configured by default', function () {
    expect(app(CloudflareWebAnalyticsSettings::class)->isConfigured())->toBeFalse();
});

it('can update and persist settings', function () {
    cloudflare_web_analytics(['token' => '0123456789abcdef0123456789abcdef']);

    expect(app(CloudflareWebAnalyticsSettings::class)->isConfigured())->toBeTrue()
        ->and(app(CloudflareWebAnalyticsSettings::class)->token)->toBe('0123456789abcdef0123456789abcdef');
});

it('belongs to the cloudflare_web_analytics group', function () {
    expect(CloudflareWebAnalyticsSettings::group())->toBe('cloudflare_web_analytics');
});

it('can be accessed via the helper function', function () {
    expect(cloudflare_web_analytics_settings())->toBeInstanceOf(CloudflareWebAnalyticsSettings::class);
});

it('reads a persisted value through the Facade', function () {
    cloudflare_web_analytics(['token' => '0123456789abcdef0123456789abcdef']);

    expect(CloudflareWebAnalytics::getFacadeRoot()->token)->toBe('0123456789abcdef0123456789abcdef');
});
