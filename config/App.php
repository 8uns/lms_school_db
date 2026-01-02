<?php

namespace Config;

class App
{
    public static function get(): array
    {
        return [
            'name' => $_ENV['APP_NAME'],
            'base_url' => $_ENV['APP_URL'],
            // 'env' => $_ENV['APP_ENV'] ?? 'production',
            'timezone' => 'Asia/Jayapura'
        ];
    }
}
