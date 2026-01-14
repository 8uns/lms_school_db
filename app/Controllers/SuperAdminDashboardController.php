<?php

namespace App\Controllers;

use App\Core\Controller;
use Config\Sidebar;

class SuperAdminDashboardController extends Controller
{
    public function __construct()
    {
        return parent::__construct();
    }
    public function index(): void
    {
        $data['sidebar'] = Sidebar::get()['SuperAdmin'];
        $this->view('layouts/header');
        $this->view('layouts/sidebar', $data['sidebar']);
        $this->view('layouts/dashboard');
        $this->view('layouts/footer');
    }
}
