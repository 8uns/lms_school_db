<?php

namespace App\Core;

class Session
{

    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {


            $path = __DIR__ . '/../../../../../Project/temp_project';

            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            session_save_path($path);

            session_set_cookie_params([
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax'
            ]);

            session_start();
        }
    }


    public static function set(string $key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }


    public static function get(string $key)
    {
        self::start();
        return $_SESSION[$key] ?? null;
    }


    public static function setFlash(string $key, string $message)
    {
        self::start();
        $_SESSION['_flash'][$key] = $message;
    }


    public static function getFlash(string $key)
    {
        self::start();
        $message = $_SESSION['_flash'][$key] ?? null;
        unset($_SESSION['_flash'][$key]);
        return $message;
    }


    public static function destroy()
    {
        self::start();
        session_destroy();
    }
}
