<?php

namespace App\Services;

use App\Models\AcademicyearsModel;

class StudentclassesService
{
    private AcademicyearsModel $academicYearsModel;

    public function __construct()
    {
        $this->academicYearsModel = new AcademicyearsModel();
    }

    public function getAcademicyearId($academic_year_id = null)
    {

        if (is_null($academic_year_id)) {
            return $this->academicYearsModel->getActiveAcademicYears()['id'];
        }
        return $academic_year_id;
    }
}
