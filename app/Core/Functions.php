<?php

use App\Core\Helper;


/**
 * URL Helpers
 */
if (!function_exists('base_url')) {
    function base_url(string $path = ''): string {
        return Helper::baseUrl($path);
    }
}