<?php

namespace Config;

class Database {
    public static function getConfig(): array {
        return [
            'host' => $_ENV['DB_HOST'] ?? '',
            'user' => $_ENV['DB_USER'] ?? '',
            'pass' => $_ENV['DB_PASS'] ?? '',
            'name' => $_ENV['DB_NAME'] ?? '',
        ];
    }
}