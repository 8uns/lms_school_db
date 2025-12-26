<?php

namespace Config;

class Database {
    public static function getConfig(): array {
        return [
            'host' => $_ENV['DB_HOST'] ?? 'localhost',
            'user' => $_ENV['DB_USER'] ?? 'user',
            'pass' => $_ENV['DB_PASS'] ?? 'pass',
            'name' => $_ENV['DB_NAME'] ?? 'db_name',
        ];
    }
}