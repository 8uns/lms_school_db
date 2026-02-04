<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Session;
use App\Models\StudentclassesModel;
use App\Models\ClassroomModel;
use App\Models\AcademicyearsModel;
use App\Services\StudentclassesService;
use Config\Sidebar;

class AdminStudentclassesController extends Controller
{
    private StudentclassesModel $studentclassesModel;
    private ClassroomModel $classroomModel;
    private AcademicyearsModel $academicYearsModel;
    private StudentclassesService $studentclassesService;

    public function __construct()
    {
        parent::__construct();
        $this->studentclassesModel = new StudentclassesModel();
        $this->classroomModel = new ClassroomModel();
        $this->academicYearsModel = new AcademicyearsModel();
        $this->studentclassesService = new StudentclassesService();
    }
    public function index($academic_year_id = NULL): void
    {
        $data['page'] = 'Rombel Siswa';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        $data['studentclasses'] = $this->studentclassesService->getStudentCountPerClasss($academic_year_id);
        $data['classrooms'] = $this->classroomModel->getClass();
        $data['academic_years'] = $this->academicYearsModel->getAcademicYears();
        $data['academic_year_id'] = $this->studentclassesService->getAcademicyearId($academic_year_id);


        $this->renderDashboard('admin/rombel-siswa', $data);
    }

    public function studentByClass($classroom_id, $academic_year_id = null): void
    {
        $data['page'] = 'Rombel Siswa';
        $data['classrooms'] = $this->classroomModel->getById($classroom_id);
        $data['subpage'] = 'Siswa Kelas ' . $data['classrooms']['class_name'];
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        $data['academic_year_id'] = $this->studentclassesService->getAcademicyearId($academic_year_id);
        $data['academic_years'] = $this->academicYearsModel->getAcademicYears();
        $data['studentInClass'] = $this->studentclassesModel->getStudentInClassroom($classroom_id, $academic_year_id);
        $data['students'] = $this->studentclassesModel->getStudentDontHaveClassroom();


        $this->renderDashboard('admin/rombel-siswa-kelas', $data);
    }

    public function createRombelSiswa(): void
    {
        if ($this->studentclassesService->create($_POST)) {
            // Berhasil membuat penugasan guru
            $this->redirect('/admin/rombel-siswa/class/' . $_POST['classroom_id'] . '/ay/' . $_POST['academic_year_id']);
        } else {
            // Gagal membuat penugasan guru
            $this->redirect('/admin/rombel-siswa/class/' . $_POST['classroom_id'] . '/ay/' . $_POST['academic_year_id']);
        }

        print_r($_POST);
    }

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

    public function deleteRombelSiswa($id, $classroom_id, $academic_year_id): void
    {
        if ($this->studentclassesModel->delete($id)) {
            // Berhasil menghapus penugasan guru
            $this->redirect('/admin/rombel-siswa/class/' . $classroom_id . '/ay/' . $academic_year_id);
        } else {
            // Gagal membuat penugasan guru
            $this->redirect('/admin/rombel-siswa/class/' . $classroom_id . '/ay/' . $academic_year_id);
        }

    }
}
