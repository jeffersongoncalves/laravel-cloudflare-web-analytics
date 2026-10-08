<?php

namespace JeffersonGoncalves\CloudflareWebAnalytics\Facades;

use Illuminate\Support\Facades\Facade;
use JeffersonGoncalves\CloudflareWebAnalytics\Settings\CloudflareWebAnalyticsSettings;

/**
 * @property ?string $token
 *
 * @see CloudflareWebAnalyticsSettings
 */
class CloudflareWebAnalytics extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CloudflareWebAnalyticsSettings::class;
    }
}
