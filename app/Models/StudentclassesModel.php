<?php

namespace App\Models;

use App\Core\Database;
use Exception;

class StudentclassesModel
{
    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }
   
    public function getStudentClasses()
    {
        $stmt = $this->db->prepare("SELECT 
                                        c.id AS classroom_id,
                                        ay.id AS academic_year_id,
                                        c.class_name,
                                        CONCAT(ay.year_name, ' (', ay.semester, ')') AS period_name,
                                        ay.is_active,
                                        COUNT(sc.student_id) AS total_students
                                    FROM student_classes sc
                                    JOIN classrooms c ON sc.classroom_id = c.id
                                    JOIN academic_years ay ON sc.academic_year_id = ay.id
                                    WHERE 
                                        ay.is_active = TRUE 
                                        AND ay.is_deleted = FALSE
                                        AND c.is_deleted = FALSE
                                    GROUP BY c.id, ay.id, c.class_name, ay.year_name, ay.semester, ay.is_active
                                    ORDER BY c.class_name ASC;");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getClassroomsStuend(){
         $stmt = $this->db->prepare("SELECT 
                                        c.id AS classroom_id,
                                        c.class_name,
                                        COUNT(sc.student_id) AS total_students
                                    FROM classrooms c
                                    -- LEFT JOIN memastikan kelas tidak hilang meskipun tidak ada kecocokan di student_classes
                                    LEFT JOIN student_classes sc ON c.id = sc.classroom_id
                                    LEFT JOIN academic_years ay ON sc.academic_year_id = ay.id
                                    WHERE 
                                        c.is_deleted = FALSE
                                    GROUP BY 
                                        c.id, c.class_name
                                    ORDER BY 
                                        c.class_name ASC;");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getStudentClassesByAcademicyear($id = 0)
    {
        if ($id) {
            $stmt = $this->db->prepare("SELECT 
                                        c.id AS classroom_id,
                                        ay.id AS academic_year_id,
                                        c.class_name,
                                        CONCAT(ay.year_name, ' (', ay.semester, ')') AS period_name,
                                        ay.is_active,
                                        COUNT(sc.student_id) AS total_students
                                    FROM student_classes sc
                                    JOIN classrooms c ON sc.classroom_id = c.id
                                    JOIN academic_years ay ON sc.academic_year_id = ay.id
                                    WHERE 
                                        ay.id = ? 
                                        AND ay.is_deleted = FALSE
                                        AND c.is_deleted = FALSE
                                    GROUP BY c.id, ay.id, c.class_name, ay.year_name, ay.semester, ay.is_active
                                    ORDER BY c.class_name ASC;");
            $stmt->execute([$id]);
            return $stmt->fetchAll();
        } else {
            return $this->getStudentClasses();
        }
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM student_classes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


    // public function create(array $data)
    // {
    //     try {
    //         if ($this->isDuplicate($data)) {
    //             return false;
    //         }
    //         $stmt = $this->db->prepare("INSERT INTO student_classes 
    //             (teacher_id, student_id, classroom_id, academic_year_id) 
    //             VALUES (?, ?, ?, ?)");

    //         return $stmt->execute([
    //             $data['teacher_id'],
    //             $data['student_id'],
    //             $data['classroom_id'],
    //             $data['academic_year_id']
    //         ]);
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }


    // public function update(int $id, array $data)
    // {
    //     try {
    //         $stmt = $this->db->prepare("UPDATE student_classes SET 
    //             teacher_id = ?, 
    //             student_id = ?, 
    //             classroom_id = ?, 
    //             academic_year_id = ? 
    //             WHERE id = ?");

    //         return $stmt->execute([
    //             $data['teacher_id'],
    //             $data['student_id'],
    //             $data['classroom_id'],
    //             $data['academic_year_id'],
    //             $id
    //         ]);
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }

    // public function delete(int $id)
    // {
    //     try {
    //         $stmt = $this->db->prepare("DELETE FROM student_classes WHERE id = ?");
    //         return $stmt->execute([$id]);
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }

    // /**
    //  * Helper: Mengecek apakah guru sudah ditugaskan di mapel & kelas yang sama pada tahun ajaran tersebut
    //  * Mencegah duplikasi data
    //  */
    // public function isDuplicate($data)
    // {
    //     $stmt = $this->db->prepare("SELECT id FROM student_classes 
    //         WHERE teacher_id = ? AND student_id = ? AND classroom_id = ? AND academic_year_id = ?");
    //     $stmt->execute([$data['teacher_id'], $data['student_id'], $data['classroom_id'], $data['academic_year_id']]);
    //     return $stmt->fetch() ? true : false;
    // }
}
