<?php

namespace JeffersonGoncalves\CloudflareWebAnalytics\Settings;

use Spatie\LaravelSettings\Settings;

class CloudflareWebAnalyticsSettings extends Settings
{
    /** Cloudflare Web Analytics token. Empty = no script. */
    public ?string $token;

    public static function group(): string
    {
        return 'cloudflare_web_analytics';
    }

    /** Whether the settings are complete enough to render the script. */
    public function isConfigured(): bool
    {
        return preg_match('/^[a-f0-9]{32}$/i', (string) $this->token) === 1;
    }
}
