---
name: cloudflare-web-analytics-development
description: Add Cloudflare Web Analytics to a Laravel app with jeffersongoncalves/laravel-cloudflare-web-analytics — Blade include, settings stored in the database via spatie/laravel-settings.
---

# Laravel Cloudflare Web Analytics Development

## When to use this skill

- Adding Cloudflare Web Analytics to a Laravel / Blade app
- Changing the Cloudflare Web Analytics settings at runtime (admin panel, seeder, tinker)
- Debugging why the Cloudflare Web Analytics script doesn't show up

## Setup

```bash
composer require jeffersongoncalves/laravel-cloudflare-web-analytics
php artisan vendor:publish --tag=cloudflare-web-analytics-settings-migrations
php artisan migrate
```

```blade
@include('cloudflare-web-analytics::script')
```

```php
$settings = cloudflare_web_analytics_settings();
$settings->token = '0123456789abcdef0123456789abcdef';
$settings->save();
```

## Settings

| Setting | Type | Default |
|---------|------|---------|
| `token` | `?string` | `null` |

## Troubleshooting

- **No script in the HTML**: the settings are incomplete or invalid — check `cloudflare_web_analytics_settings()->isConfigured()`.
- **Settings not found**: run the settings migration (`php artisan migrate` after publishing).
- **Filament panel**: use `jeffersongoncalves/filament-cloudflare-web-analytics`, which injects the same view into panels and adds a settings page.
