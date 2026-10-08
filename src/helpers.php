<?php

use JeffersonGoncalves\CloudflareWebAnalytics\Settings\CloudflareWebAnalyticsSettings;

if (! function_exists('cloudflare_web_analytics_settings')) {
    function cloudflare_web_analytics_settings(): CloudflareWebAnalyticsSettings
    {
        return app(CloudflareWebAnalyticsSettings::class);
    }
}
