<?php

namespace App\Controllers\Guru;

use App\Core\Controller;
use Config\Sidebar;
use App\Core\Session;
use App\Models\AcademicyearsModel;
use App\Models\ClassroomModel;
use App\Models\SubjectModel;

use App\Services\StudentclassesService;
use App\Services\QuestionBankService;

class GuruBanksoalController extends Controller
{
    private QuestionBankService $question_bank_service;
    private AcademicyearsModel $academicYearsModel;
    private StudentclassesService $studentclassesService;
    private ClassroomModel $classroom_model;
    private SubjectModel $subject_model;

    public function __construct()
    {
        parent::__construct();
        $this->question_bank_service = new QuestionBankService;
        $this->academicYearsModel = new AcademicyearsModel();
        $this->studentclassesService = new StudentclassesService();
        $this->classroom_model = new ClassroomModel();
        $this->subject_model = new SubjectModel();
    }
    public function index($academic_year_id = NULL): void
    {
        $data['page'] = 'Bank Soal';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = Session::get('role');
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];

        $data['academic_years'] = $this->academicYearsModel->getAcademicYears();
        $data['academic_year_id'] = $this->studentclassesService->getAcademicyearId($academic_year_id);

        $data['classsubject'] = $this->question_bank_service->getTeacherQuestionStats($academic_year_id);

        $this->renderDashboard('/guru/bank-soal', $data);
    }

    public function getQuestionsByContext($subject_id, $classroom_id, $academic_year_id)
    {
        $data['page'] = 'Bank Soal';
        $data['subject'] = $this->subject_model->getById($subject_id);
        $data['subpage'] = 'Koleksi Soal : ' . $data['subject']['subject_name'];
        $data['classroom'] = $this->classroom_model->getById($classroom_id);
        $data['academic_year'] = $this->academicYearsModel->getById($academic_year_id);
        // $data['subpage'] = 'Soal Kelas ' . $data['classroom']['class_name'] . ' - Tahun Ajaran ' . $data['academic_year']['year_name'] . ' Semester ' . $data['academic_year']['semester'];
        $data['full_name'] = Session::get('full_name');
        $data['role'] = Session::get('role');
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        // $data['classsubject'] = $this->question_bank_service->getCalassAndSubject();

        $this->renderDashboard('/guru/bank-soal-by-class-academicyear', $data);
    }
}
