<?php

namespace App\Core;

class View
{
    public static function render(string $view, $data = [])
    {
        extract($data);
        require __DIR__ . "/../View/" . $view . ".php";
    }

    public static function renderPage(string $view, $data = [])
    {
        Self::render('layouts/header');
        Self::render($view, $data);
        Self::render('layouts/footer');
    }
}
