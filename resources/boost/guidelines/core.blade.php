## Laravel Cloudflare Web Analytics

### Overview
Renders the Cloudflare Web Analytics script in Blade layouts. The settings are stored in the database with `spatie/laravel-settings` (`CloudflareWebAnalyticsSettings`, group `cloudflare_web_analytics`) — no config file, no `.env`.

### Usage

@verbatim
<code-snippet name="blade-include" lang="blade">
@include('cloudflare-web-analytics::script')
</code-snippet>
@endverbatim

@verbatim
<code-snippet name="configure" lang="php">
$settings = cloudflare_web_analytics_settings();
$settings->token = '0123456789abcdef0123456789abcdef';
$settings->save();
</code-snippet>
@endverbatim

### Conventions
- Namespace: `JeffersonGoncalves\CloudflareWebAnalytics`; view namespace `cloudflare-web-analytics` (`cloudflare-web-analytics::script`)
- The script renders only when `CloudflareWebAnalyticsSettings::isConfigured()` is true
- Publish migrations with `php artisan vendor:publish --tag=cloudflare-web-analytics-settings-migrations`
