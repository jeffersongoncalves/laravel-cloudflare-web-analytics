<?php

// Stand-in for the helper of jeffersongoncalves/laravel-cookie-consent, which this package
// calls only when it is installed.
if (! function_exists('cookie_consent_script_attributes')) {
    function cookie_consent_script_attributes(string $id): string
    {
        return $GLOBALS['cookie_consent_attributes'][$id] ?? '';
    }
}

afterEach(fn () => $GLOBALS['cookie_consent_attributes'] = []);

it('holds every script while laravel-cookie-consent blocks its category', function () {
    $GLOBALS['cookie_consent_attributes']['cloudflare-web-analytics'] = ' type="text/plain" data-category="analytics"';
    cloudflare_web_analytics(['token' => '0123456789abcdef0123456789abcdef']);
    $html = (string) $this->blade('@include("cloudflare-web-analytics::script")');

    preg_match_all('/<script\b[^>]*>/', $html, $tags);

    expect($tags[0])->not->toBeEmpty()
        ->each(fn ($tag) => $tag->toContain('type="text/plain" data-category="analytics"')->not->toContain('text/javascript'))
        ->and($html)->not->toContain('<noscript');
});

it('renders its scripts as before when nothing is held', function () {
    cloudflare_web_analytics(['token' => '0123456789abcdef0123456789abcdef']);
    $html = (string) $this->blade('@include("cloudflare-web-analytics::script")');

    expect($html)->toContain('<script')->not->toContain('text/plain');
});
