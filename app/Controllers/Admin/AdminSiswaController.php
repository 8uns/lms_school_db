<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Session;
use App\Models\UserModel;
use App\Services\UserService;
use Config\Sidebar;

class AdminSiswaController extends Controller
{
    private UserModel $user_model;
    private UserService $user_service;

    public function __construct()
    {
        parent::__construct();
        $this->user_model = new UserModel();
        $this->user_service = new UserService();
    }
    public function index(): void
    {
        $data['page'] = 'Akun Siswa';
        $data['subpage'] = false;
        $data['full_name'] = Session::get('full_name');
        $data['role'] = $_SESSION['role'];
        $data['sidebar'] = Sidebar::get()[$_SESSION['role']];
        $data['user'] = $this->user_model->getSiswa();
        $this->renderDashboard('admin/siswa', $data);
    }

    public function createSiswa(): void
    {
        if ($this->user_model->createSiswa($_POST)) {
            // Berhasil membuat siswa
            $this->redirect('/admin/siswa');
        } else {
            // Gagal membuat siswa
            $this->redirect('/admin/siswa');
        }
    }

    public function updateSiswa($id): void
    {
        if ($this->user_model->updateSiswa($id, $_POST)) {
            // Berhasil mengupdate siswa
            $this->redirect('/admin/siswa');
        } else {
            // Gagal mengupdate siswa
            $this->redirect('/admin/siswa');
        }
    }

    public function deleteSiswa($id): void
    {
        if ($this->user_model->delete($id)) {
            // Berhasil menghapus siswa
            $this->redirect('/admin/siswa');
        } else {
            // Gagal menghapus siswa
            $this->redirect('/admin/siswa');
        }
    }

    public function importStudents(): void
    {
        $this->user_service->importStudents($_FILES);
        
        // if ($this->user_service->importStudents($_FILES)) {
        //     Session::setFlash('message', 'Data siswa berhasil diimport.');
        // } else {
        //     Session::setFlash('message', 'Gagal mengimport data. Pastikan format file benar.');
        // }
        // Session::getFlash('message');
        // $this->redirect('/admin/siswa');
    }
}
