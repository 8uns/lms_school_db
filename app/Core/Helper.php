<?php

namespace App\Core;

class Helper
{
    /**
     * Membuat base URL untuk aset (CSS, JS, Images)
     * Contoh: Helper::asset('css/style.css')
     */
    public static function asset(string $path): string
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        // Menghapus slash di awal jika ada
        $path = ltrim($path, '/');
        return "{$protocol}://{$host}/{$path}";
    }

    /**
     * Mempermudah redirect dengan flash message
     * Contoh: Helper::redirect('/login', 'error', 'Silahkan login dulu');
     */
    public static function redirect(string $url, string $flashKey = null, string $message = null)
    {
        if ($flashKey && $message) {
            Session::setFlash($flashKey, $message);
        }
        header("Location: $url");
        exit;
    }

    /**
     * Format Rupiah
     */
    public static function formatRupiah(int $angka): string
    {
        return "Rp " . number_format($angka, 0, ',', '.');
    }

    /**
     * Dump and Die untuk debugging
     */
    public static function dd($data)
    {
        echo "<pre style='background: #222; color: #5ef764; padding: 20px; border-radius: 5px;'>";
        var_dump($data);
        echo "</pre>";
        die();
    }
}