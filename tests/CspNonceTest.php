<?php

use Illuminate\Support\Facades\Vite;

it('stamps the CSP nonce on every script tag', function () {
    Vite::useCspNonce('test-nonce');
    cloudflare_web_analytics(['token' => '0123456789abcdef0123456789abcdef']);
    $html = (string) $this->blade('@include("cloudflare-web-analytics::script")');

    preg_match_all('/<script\b[^>]*>/', $html, $tags);

    expect($tags[0])->not->toBeEmpty()->each->toContain('nonce="test-nonce"');
});

it('renders no nonce attribute when the app uses none', function () {
    cloudflare_web_analytics(['token' => '0123456789abcdef0123456789abcdef']);
    $html = (string) $this->blade('@include("cloudflare-web-analytics::script")');

    expect($html)->toContain('<script')->not->toContain('nonce=');
});
