<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Session;
use App\Models\StudentclassesModel;
use App\Models\ClassroomModel;
use App\Models\AcademicyearsModel;
use App\Models\UserModel;
use App\Services\StudentclassesService;
use Config\Sidebar;

class AdminStudentclassesController extends Controller
{
    private StudentclassesModel $studentclassesModel;
    private ClassroomModel $classroomModel;
    private AcademicyearsModel $academicYearsModel;
    private UserModel $userModel;
    private StudentclassesService $studentclassesService;

    public function __construct()
    {
        parent::__construct();
        $this->studentclassesModel = new StudentclassesModel();
        $this->classroomModel = new ClassroomModel();
        $this->academicYearsModel = new AcademicyearsModel();
        $this->userModel = new UserModel();
        $this->studentclassesService = new StudentclassesService();
    }
    public function index($academic_year_id = NULL): void
    {
        $data['page'] = 'Rombel Siswa';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        $data['studentclasses'] = $this->studentclassesModel->getClasgetStudentCountPerClasss($academic_year_id);
        $data['classrooms'] = $this->classroomModel->getClass();
        $data['academic_years'] = $this->academicYearsModel->getAcademicYears();
        // $data['subject'] = $this->subjectModel->getSubjects();
        // $data['guru'] = $this->userModel->getGuru();
        $data['academic_year_id'] =  $academic_year_id;

        $this->renderDashboard('admin/rombel-siswa', $data);
    }

    public function studentByClass($classroom_id, $academic_year_id = null): void
    {
        $data['page'] = 'Rombel Siswa';
        $data['subpage'] = 'Menambahkan Siswa';
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        $data['classrooms'] = $this->classroomModel->getById($classroom_id);
        $data['classroom_id'] = $classroom_id;
        $data['academic_year_id'] = $this->studentclassesService->getAcademicyearId($academic_year_id);
        $data['academic_years'] = $this->academicYearsModel->getAcademicYears();
        $data['siswa'] = $this->userModel->getSiswa();

        $this->renderDashboard('admin/rombel-siswa-tambah', $data);
    }

    // public function createPenugasanGuru(): void
    // {
    //     if ($this->studentclassesModel->create($_POST)) {
    //         // Berhasil membuat penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     } else {
    //         // Gagal membuat penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     }
    // }

    // public function updatePenugasanGuru($id): void
    // {
    //     if ($this->studentclassesModel->update($id, $_POST)) {
    //         // Berhasil mengupdate penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     } else {
    //         // Gagal mengupdate penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     }
    // }

    // public function deletePenugasanGuru($id): void
    // {
    //     if ($this->studentclassesModel->delete($id)) {
    //         // Berhasil menghapus penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     } else {
    //         // Gagal menghapus penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     }
    // }
}
