@php($settings = app(\JeffersonGoncalves\CloudflareWebAnalytics\Settings\CloudflareWebAnalyticsSettings::class))

@if($settings->isConfigured())
    <script @if(\Illuminate\Support\Facades\Vite::cspNonce()) nonce="{{ \Illuminate\Support\Facades\Vite::cspNonce() }}" @endif defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{{ json_encode(['token' => $settings->token]) }}'></script>
@endif
