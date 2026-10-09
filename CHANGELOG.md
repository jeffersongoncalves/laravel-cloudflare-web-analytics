# Changelog

All notable changes to `laravel-cloudflare-web-analytics` will be documented in this file.

## 1.1.0 - 2026-10-09

- Every `<script>` rendered by the package carries Laravel's Vite CSP nonce when the app sets one (e.g. via laravel-security-headers), so nonce-based `script-src` policies work without `'unsafe-inline'`.

## 1.0.0 - 2026-10-08

First release.

- `@include('cloudflare-web-analytics::script')` renders the Cloudflare Web Analytics script once the settings are complete
- `CloudflareWebAnalyticsSettings` stored with spatie/laravel-settings, validated before rendering
- `CloudflareWebAnalytics` facade and `cloudflare_web_analytics_settings()` helper

Requires PHP 8.2+ and Laravel 12.61+ or 13.
