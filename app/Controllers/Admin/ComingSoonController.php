<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Session;
use App\Models\StudentclassesModel;
use App\Models\ClassroomModel;
use App\Models\AcademicyearsModel;
use App\Models\SubjectModel;
use App\Models\UserModel;
use Config\Sidebar;

class ComingSoonController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index(): void
    {
        $data['page'] = 'ComingSoon';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        
        $this->renderDashboard('/layouts/comingsoon', $data);
    }

    public function kurikulum(): void
    {
        $data['page'] = 'Kurikulum/RPP';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        
        $this->renderDashboard('/layouts/comingsoon', $data);
    }

    public function rekap(): void
    {
        $data['page'] = 'Rekapitulasi Data';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        
        $this->renderDashboard('/layouts/comingsoon', $data);
    }

    
}
