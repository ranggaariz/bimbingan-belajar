<?php

namespace App\Controllers;

require_once APPPATH . 'Libraries/PhpSpreadsheet/Spreadsheet.php';
require_once APPPATH . 'Libraries/PhpSpreadsheet/Writer/Xlsx.php';

use App\Models\AdminModel;
use App\Models\JadwalModel;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{
    protected $adminModel;
    protected $cutiModel;
    protected $timeslipModel;
    protected $seragamModel;
    protected $jadwalModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->jadwalModel = new JadwalModel();
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
            'title' => 'Sistem Informasi Bimbingan Belajar (SIBEL)',
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
            'title' => 'Sistem Informasi Bimbingan Belajar (SIBEL)',
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
            'title' => 'Sistem Informasi Bimbingan Belajar (SIBEL)'
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
            'title' => 'Sistem Informasi Bimbingan Belajar (SIBEL)',
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
            'title' => 'Sistem Informasi Bimbingan Belajar (SIBEL)',
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

            $email->setFrom('israwinda68@gmail.com', 'Admin Bimbel');
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
    
    public function jadwal()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Jadwal Pelajaran',
            'data_master' => $this->jadwalModel->getJadwal(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/jadwal', $data)
            . view('templates/footer');
    }

    public function addJadwal()
    {
        $data = [
            'hari' => $this->request->getPost('hari'),
            'pelajaran' => $this->request->getPost('pelajaran')
        ];

        $this->jadwalModel->saveJadwal($data);

        session()->setFlashdata('message', '<div class="alert alert-success">Add data successfully.</div>');
        return redirect()->to(base_url('admin/jadwal'));
    }

    public function export()
    {
        // 1️⃣ Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $data = $this->adminModel->getExport();

        // tulis header kolom (ambil dari key object)
        $headers = array_keys(get_object_vars($data[0]));
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', ucfirst(str_replace('_', ' ', $header)));
            $col++;
        }

        // isi data baris per baris
        $row = 2;
        foreach ($data as $user) {
            $col = 'A';
            foreach ($headers as $field) {
                $sheet->setCellValue($col . $row, $user->$field);
                $col++;
            }
            $row++;
        }

        // download hasilnya
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_User_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
