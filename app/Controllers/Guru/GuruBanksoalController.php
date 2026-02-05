<?php

namespace App\Controllers\Guru;

use App\Core\Controller;
use Config\Sidebar;
use App\Core\Session;


class GuruBanksoalController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index(): void
    {
        $data['page'] = 'Bank Soal';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = Session::get('role');
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        
        $this->renderDashboard('/guru/bank-soal', $data);
    }
}
