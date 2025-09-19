<?php

namespace App\Controllers;

use App\Models\M_login;

class Login extends BaseController
{
    protected $ml;

    public function __construct()
    {
        $this->ml = new M_login(); // Load model
        helper('form'); 
        helper('url');
    }

    public function index()
    {
        $data['title'] = 'Login | Sistem Informasi Bimbingan Belajar';

        if (session()->get('role') == 'Pengajar') {
            return redirect()->to('/pengajar/index');
        } elseif (session()->get('role') == 'Admin') {
            return redirect()->to('/admin/index');
        } elseif (session()->get('role') == 'Pelajar') {
            return redirect()->to('/pelajar/index');
        }

        return view('welcome_page/index', $data);
        // return view('templates/header_w', $data)
        //     . view('welcome_page/index');
    }

    public function viewLogin()
    {
        $data['title'] = 'Login | Sistem Informasi Bimbingan Belajar';

        if (session()->get('role') == 'Pengajar') {
            return redirect()->to('/pengajar/index');
        } elseif (session()->get('role') == 'Admin') {
            return redirect()->to('/admin/index');
        } elseif (session()->get('role') == 'Pelajar') {
            return redirect()->to('/pelajar/index');
        }

        return view('templates/header_w', $data)
            . view('v_login');
    }

    public function aksi_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->ml->cek_users($username, $password);
        // $user = $this->ml->cek_users($username, $password);

        if ($user) {
            $userData = [
                'id_user'  => $user->id_user,
                'nama'     => $user->nama,
                'username' => $user->username,
                'role'     => $user->role,
            ];
            session()->set($userData);

            // Redirect berdasarkan role
            switch ($user->role) {
                case 'Pengajar':
                    return redirect()->to('/pengajar/index');
                case 'Admin':
                    return redirect()->to('/admin/index');
                case 'Pelajar':
                    return redirect()->to('/pelajar/index');
            }
        }

        session()->setFlashdata('error', 'Username & Password salah');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        $count = $this->ml->checkQuota();
        if ($count > 100) return redirect()->back()->with('error', 'Kuota pelajar sudah penuh.');
        $data['title'] = "Formulir Pendaftaran/Permohonan Menjadi Anggota";

        return view('templates/header_w', $data)
            . view('form/register', $data);
    }

    public function saveRegister()
    {
        $file = $this->request->getFile('userfile');

        $newName = null;
        // Cek apakah file valid dan sudah di-upload
        if ($file && $file->isValid() && !$file->hasMoved()) {

            // Validasi ekstensi file2
            $ext = $file->getClientExtension();
            if (!in_array($ext, ['jpg', 'png', 'pdf', 'doc', 'docx'])) {
                return redirect()->back()->with('error', 'File type not allowed.');
            }

            // Simpan file ke folder 'public/asset/upload'
            $newName = $file->getRandomName(); // Bisa juga pakai $file->getName()
            $file->move(ROOTPATH . 'public/asset/upload', $newName);
        }
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'umur' => $this->request->getPost('umur'),
            'no_hp' => $this->request->getPost('no_hp'),
            'tingkatan' => $this->request->getPost('tingkatan'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'password' => $this->request->getPost('password'),
            'email' => $this->request->getPost('email'),
            'role' => 'Pelajar',
            'userfile' => $newName,
            "is_active" => 0
            // Tambahkan field lainnya sesuai kebutuhan...
        ];

        // $this->adminModel->saveUser($data);
        $this->ml->saveUser($data);
        session()->setFlashdata('message', '<div class="alert alert-success">Permohonan berhasil dimasukkan! Mohon menunggu persetujuan dari Admin.</div>');
        return redirect()->to('/login');
    }

    public function ubahPassword()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'new'     => 'required',
            're_new'  => 'required|matches[new]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $data['title'] = "Lupa Password";
            return view('templates/header_w', $data)
                . view('edit/forgot', $data);
        }

        $user = $this->ml->cek_user();

        if (!$user) {
            session()->setFlashdata('password', '<div class="alert alert-danger">NIP anda tidak terdaftar.</div>');
            $data['title'] = "Lupa Password";
            return view('templates/header_w', $data)
                . view('edit/forgot', $data);
        }

        $this->ml->updatePass();
        session()->setFlashdata('password', '<div class="alert alert-success">Password berhasil diupdate.</div>');
        return redirect()->to('/login');
    }

    public function aaa()
    {
        $email = \Config\Services::email();
        $config = new \Config\Email();
        $email->initialize($config);

        $email->setFrom('israwinda68@gmail.com', 'Admin Bimbel');
        $email->setTo('pblkusukses100persen@gmail.com'); // ganti email penerima

        $email->setSubject('Test Kirim Email dari Localhost');
        $email->setMessage('<p>Halo! Ini percobaan kirim email dari CodeIgniter 4 di localhost.</p>');

        if ($email->send()) {
            echo "✅ Email berhasil dikirim!";
        } else {
            echo $email->printDebugger(['headers', 'subject', 'body']);
        }
    }
}
