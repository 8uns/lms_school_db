<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Services\AuthService;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct()
    {
        parent::__construct();
        $this->authService = new AuthService();
    }

    public function login()
    {
        // Jika sudah login, jangan tampilkan form login lagi
        if (Session::get('user_id')) {
            $this->redirect('/');
        }
        $this->view('login');
    }

    public function postLogin()
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');

        if ($this->authService->login($username, $password)) {
            $this->redirect('/');
        } else {
            Session::setFlash('error', 'Username atau Password salah!');
            $this->redirect('/login');
        }
    }

    public function logout()
    {
        AuthService::logout();
        $this->redirect('/login');
    }

    public function notfound()
    {
        $this->view('notfound');
    }
}
