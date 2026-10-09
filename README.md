<div class="filament-hidden">

![Laravel Cloudflare Web Analytics](https://raw.githubusercontent.com/jeffersongoncalves/laravel-cloudflare-web-analytics/main/art/jeffersongoncalves-laravel-cloudflare-web-analytics.png)

</div>

# Laravel Cloudflare Web Analytics

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/laravel-cloudflare-web-analytics.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/laravel-cloudflare-web-analytics)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/laravel-cloudflare-web-analytics/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/laravel-cloudflare-web-analytics/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/laravel-cloudflare-web-analytics.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/laravel-cloudflare-web-analytics)

Add [Cloudflare Web Analytics](https://www.cloudflare.com/web-analytics/) — privacy-first, cookie-free analytics from Cloudflare — to your Laravel app. The settings are stored in the database with [spatie/laravel-settings](https://github.com/spatie/laravel-settings), so you can change them at runtime (e.g. from an admin panel) instead of in `.env`.

For a Filament settings page, use [jeffersongoncalves/filament-cloudflare-web-analytics](https://github.com/jeffersongoncalves/filament-cloudflare-web-analytics).

## Installation

```bash
composer require jeffersongoncalves/laravel-cloudflare-web-analytics
```

Publish and run the settings migration:

```bash
php artisan vendor:publish --tag=cloudflare-web-analytics-settings-migrations
php artisan migrate
```

## Configuration

```php
$settings = cloudflare_web_analytics_settings();
$settings->token = '0123456789abcdef0123456789abcdef';
$settings->save();
```

Or through the settings class or the Facade:

```php
use JeffersonGoncalves\CloudflareWebAnalytics\Facades\CloudflareWebAnalytics;
use JeffersonGoncalves\CloudflareWebAnalytics\Settings\CloudflareWebAnalyticsSettings;

$settings = app(CloudflareWebAnalyticsSettings::class);
$value = CloudflareWebAnalytics::getFacadeRoot()->token;
```

### Available settings

| Setting | Type | Default | Description |
|---------|------|---------|-------------|
| `token` | `?string` | `null` | Your Cloudflare Web Analytics token. The script only renders when it is valid. |

## Usage

Add the script to your Blade layout, inside `<head>`:

```blade
@include('cloudflare-web-analytics::script')
```

Nothing is rendered until the settings are complete, so you can ship the include everywhere and turn Cloudflare Web Analytics on later.

## Content Security Policy

When your app sets a CSP nonce through Laravel's Vite (`Vite::useCspNonce()`, as [laravel-security-headers](https://github.com/jeffersongoncalves/laravel-security-headers) does), every `<script>` this package renders carries it, so a `script-src 'self' 'nonce-{nonce}'` policy works without `'unsafe-inline'`. Scripts loaded afterwards from the vendor's own CDN still need that host in `script-src` (and its API in `connect-src`).

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
