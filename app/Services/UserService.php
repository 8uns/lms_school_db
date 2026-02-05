<?php

namespace App\Services;

use App\Core\Helper;
use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Exception;

class UserService
{
    private UserModel $user_model;

    public function __construct()
    {
        $this->user_model = new UserModel();
    }

    public function importStudents($files)
    {
        if (!isset($files['importfile']) || $files['importfile']['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        $filePath = $files['importfile']['tmp_name'];

        try {
            // 2. Load file excel
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();

            // Jika file kosong (hanya header atau benar-benar kosong)
            if (count($data) <= 1) {
                return false;
            }

            // 3. Iterasi baris (mulai dari indeks 1 untuk melewati header)
            // Kolom: A (0) = Nama, B (1) = NISN
            foreach ($data as $index => $row) {
                if ($index === 0) continue; // Lewati header

                $fullName = $row[0] ?? null;
                $nisn = $row[1] ?? null;

                // Validasi data minimal
                if (empty($fullName) || empty($nisn)) {
                    continue; 
                }

                // Siapkan data untuk model
                $payload = [
                    'username'  => $nisn, // NISN digunakan sebagai username
                    'password'  => $nisn, // Default password adalah NISN
                    'full_name' => $fullName,
                    'role'      => 'Siswa'
                ];

                // 4. Simpan ke database
                // Menggunakan model yang sudah Anda miliki
                $this->user_model->createSiswaFromImport($payload);
            }

            return true;
        } catch (Exception $e) {
            // Log error jika diperlukan: error_log($e->getMessage());
            return false;
        }
    }
}