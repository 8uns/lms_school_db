<?php

namespace App\Middlewares;

use App\Core\Middleware;
use App\Core\Session;
use App\Core\View;

class AuthMiddleware implements Middleware
{
    public function before(): void
    {
        $user = Session::get('user_id');
        if (!$user) {
            View::render("auth/login");
            exit;
        }
    }
}
