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

class AdminStudentclassesController extends Controller
{
    private StudentclassesModel $studentclasses;
    private ClassroomModel $classroomModel;
    private AcademicyearsModel $academicYearsModel;
    private SubjectModel $subjectModel;
    private UserModel $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->studentclasses = new StudentclassesModel();
        $this->classroomModel = new ClassroomModel();
        $this->academicYearsModel = new AcademicyearsModel();
        $this->subjectModel = new SubjectModel();
        $this->userModel = new UserModel();
    }
    public function index($academic_year_id = 0): void
    {
        $data['page'] = 'Rombel Siswa';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        $data['studentclasses'] = $this->studentclasses->getClassroomsStuend($academic_year_id);
        $data['classrooms'] = $this->classroomModel->getClass();
        $data['academic_years'] = $this->academicYearsModel->getAcademicYears();
        $data['subject'] = $this->subjectModel->getSubjects();
        $data['guru'] = $this->userModel->getGuru();
        $data['academic_year_id'] =  $academic_year_id;

        $this->renderDashboard('admin/rombel-siswa', $data);
    }

    // public function createPenugasanGuru(): void
    // {
    //     if ($this->studentclasses->create($_POST)) {
    //         // Berhasil membuat penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     } else {
    //         // Gagal membuat penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     }
    // }

    // public function updatePenugasanGuru($id): void
    // {
    //     if ($this->studentclasses->update($id, $_POST)) {
    //         // Berhasil mengupdate penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     } else {
    //         // Gagal mengupdate penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     }
    // }

    // public function deletePenugasanGuru($id): void
    // {
    //     if ($this->studentclasses->delete($id)) {
    //         // Berhasil menghapus penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     } else {
    //         // Gagal menghapus penugasan guru
    //         $this->redirect('/admin/penugasan-guru');
    //     }
    // }
}
