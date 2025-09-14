<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class Admin extends BaseController
{
    protected $adminModel;
    protected $cutiModel;
    protected $timeslipModel;
    protected $seragamModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper('form'); 
    }

    public function index()
    {
        if (session()->get('role') != 'Admin') {
            return redirect()->to(base_url('login/index'));
        }
        $totalUser = $this->adminModel->countUser();
        $totalPendaftar = $this->adminModel->countPendaftar();
        $totalPelajar = $this->adminModel->countPelajar();

        $data = [
            'title' => 'Bimbingan Belajar',
            'totalUser' => $totalUser,
            'totalPendaftar' => $totalPendaftar,
            'totalPelajar' => $totalPelajar,
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('dashboard', $data)
            . view('templates/footer');
    }

    public function user()
    {
        if (session()->get('role') != 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar',
            'data_user' => $this->adminModel->getUser()
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/user', $data)
            . view('templates/footer');
    }

    public function formUser()
    {
        if (session()->get('role') != 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Manajemen Karyawan'
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('form/user', $data)
            . view('templates/footer');
    }

    public function openUser($id_user)
    {
        if (session()->get('role') != 'Admin') {
            return redirect()->to(base_url('login/index'));
        }
        
        $user = $this->adminModel->getUserDetail($id_user);
        $profile = base_url("asset/upload/avatar.PNG");
        if (isset($user['picture'])) $profile = base_url("asset/upload/" . $user['picture']);

        $data = [
            'title' => 'Manajemen Karyawan',
            'data_user' => $user,
            'picture' => $profile
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/user_detail', $data)
            . view('templates/footer');
    }

    public function addUser()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
            "is_active" => 1
            // Tambahkan field lainnya sesuai kebutuhan...
        ];

        $this->adminModel->saveUser($data);

        session()->setFlashdata('message', '<div class="alert alert-success">Add data successfully.</div>');
        return redirect()->to(base_url('admin/user'));
    }

    public function formEditUser($id_user)
    {
        if (session()->get('role') != 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Manajemen Karyawan',
            'data_user' => $this->adminModel->getUserDetail($id_user)
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('form/editUser', $data)
            . view('templates/footer');
    }

    public function editUser($id_user)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'role' => $this->request->getPost('role')
        ];

        $this->adminModel->updateUser($data, $id_user);

        session()->setFlashdata('message', '<div class="alert alert-success">Edit data successfully.</div>');
        return redirect()->to(base_url('admin/user'));
    }

    public function deleteUser()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->adminModel->deleteUser($id);

        session()->setFlashdata('message', '<div class="alert alert-success">Delete data successfully.</div>');
        return $this->response->setJSON(['success' => true]);
    }
    
    public function daftarPelajar()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Pendaftaran Pelajar',
            'data_master' => $this->adminModel->getDaftarAnggota(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/daftar_anggota', $data)
            . view('templates/footer');
    }

    public function approveAnggotaAdmin($id_user)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_user');
        $builder->where('id_user', $id_user);
        $builder->update(['is_active' => 1]);

        // ambil email user yg di-approve
        $user = $builder->where('id_user', $id_user)->get()->getRow();

        if ($user) {
            $email = \Config\Services::email();

            // load konfigurasi dari app/Config/Email.php
            $config = new \Config\Email();
            $email->initialize($config);

            $email->setFrom('israwinda05@gmail.com', 'Admin Bimbel');
            $email->setTo($user->email);

            $email->setSubject('Akun Kamu Sudah Aktif');
            $email->setMessage("
                <h3>Halo {$user->nama},</h3>
                <p>Akun kamu sudah berhasil diaktifkan oleh admin. 
                Sekarang kamu bisa login ke aplikasi dan mulai menggunakan layanan.</p>
                <br>
                <p>Salam,<br>Admin</p>
            ");

            if (! $email->send()) {
                log_message('error', 'Email gagal dikirim ke ' . $user->email);
                log_message('error', print_r($email->printDebugger(['headers']), true));
            }
        }

        return redirect()->to(base_url('admin/daftarPelajar'));
    }
    
    public function pelajar()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Data Pelajar',
            'data_master' => $this->adminModel->getAnggota(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/anggota', $data)
            . view('templates/footer');
    }

    public function formCuti()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $id_user = session()->get('id_user');
        $user = $this->adminModel->getUserLogin($id_user);
        $cuti = $user['sisa_cuti'];
        $data = [
            'title' => 'Manajemen Karyawan',
            'user' => $user,
            'cuti' => $cuti,
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('form/cuti', $data)
            . view('templates/footer');
    }

    public function addCuti()
    {
        // $id_user = session()->get('id_user');
        $user = $this->adminModel->getUserDetail(session()->get('id_user'));
        $sisa_cuti = $user['sisa_cuti'] - 1;
        $this->adminModel->updateSisaCuti($user['id_user'], $sisa_cuti);
        $data = [
            'keterangan' => $this->request->getPost('keterangan'),
            'date_from' => $this->request->getPost('date_from'),
            'date_until' => $this->request->getPost('date_until'),
            'type' => $this->request->getPost('type'),
            'id_user' => session()->get('id_user'),
            'status' => 'HRD',
        ];

        $this->cutiModel->saveCuti($data);

        session()->setFlashdata('message', 'Data cuti berhasil ditambahkan.');
        return redirect()->to('admin/cuti');
    }

    public function openCuti($id_cuti, $id_user)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $user = $this->adminModel->getUserLogin($id_user);
        $cuti = $user['sisa_cuti'];

        $data = [
            'title' => 'Manajemen Karyawan',
            'user' => $user,
            'cuti' => $cuti,
            'data_cuti' => $this->cutiModel->getCutiDetail($id_cuti),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/cuti_detail', $data)
            . view('templates/footer');
    }

    public function approveCuti()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->cutiModel->approveCutiHRD($id);

        session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Approve data successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        return $this->response->setJSON(['success' => true]);
    }

    public function rejectCuti()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->cutiModel->rejectHRD($id);

        session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Reject data successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        return $this->response->setJSON(['success' => true]);
    }

    public function timeslip()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Manajemen Karyawan | Pengajuan Timeslip',
            'data_master' => $this->timeslipModel->getTimeslip(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/timeslip', $data)
            . view('templates/footer');
    }

    public function openTimeslip($id_timeslip, $id_user)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Manajemen Karyawan',
            'user' => $this->adminModel->getUserDetail($id_user),
            'data_timeslip' => $this->timeslipModel->getTimeslipDetail($id_timeslip),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/timeslip_detail', $data)
            . view('templates/footer');
    }

    public function approveTimeslip()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->timeslipModel->approveHRD($id);

        session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Approve data successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        return $this->response->setJSON(['success' => true]);
    }

    public function rejectTimeslip()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->timeslipModel->rejectHRD($id);

        session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Reject data successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        return $this->response->setJSON(['success' => true]);
    }

    public function seragam()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Manajemen Karyawan | Pengajuan Seragam Kerja',
            'data_master' => $this->seragamModel->getSeragam(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/seragam', $data)
            . view('templates/footer');
    }

    public function approveSeragam()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->seragamModel->approveHRD($id);

        session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Approve data successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        return $this->response->setJSON(['success' => true]);
    }

    public function rejectSeragam()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->seragamModel->rejectHRD($id);

        session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Reject data successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        return $this->response->setJSON(['success' => true]);
    }

}
