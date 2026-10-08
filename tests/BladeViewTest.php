<?php

it('renders the Cloudflare Web Analytics script once configured', function () {
    cloudflare_web_analytics(['token' => '0123456789abcdef0123456789abcdef']);

    $this->blade('@include("cloudflare-web-analytics::script")')
        ->assertSee('static.cloudflareinsights.com/beacon.min.js', false)
        ->assertSee('0123456789abcdef0123456789abcdef', false);
});

it('renders nothing while it is not configured', function () {
    cloudflare_web_analytics(['token' => null]);

    $this->blade('@include("cloudflare-web-analytics::script")')->assertDontSee('cloudflareinsights.com', false);
});

it('does not render an invalid value into the page', function () {
    cloudflare_web_analytics(['token' => 'x\'><script>alert(1)</script>']);

    $this->blade('@include("cloudflare-web-analytics::script")')
        ->assertDontSee('cloudflareinsights.com', false)
        ->assertDontSee('alert(1)', false);
});
