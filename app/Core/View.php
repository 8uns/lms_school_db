<?php

namespace App\Core;

class View
{
    public static function render(string $view, $data = [])
    {
        extract($data);
        require __DIR__ . "/../View/" . $view . ".php";
    }
}
