<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\JadwalModel;
use App\Models\SoalModel;
use App\Models\JawabanModel;
use App\Models\MateriModel;
use App\Models\NilaiModel;
// use App\Models\TimeslipModel;
// use App\Models\SeragamModel;

class Pengajar extends BaseController
{
    protected $adminModel;
    protected $jadwalModel;
    protected $soalModel;
    protected $jawabanModel;
    protected $materiModel;
    protected $nilaiModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->jadwalModel = new JadwalModel();
        $this->soalModel = new SoalModel();
        $this->jawabanModel = new JawabanModel();
        $this->materiModel = new MateriModel();
        $this->nilaiModel = new NilaiModel();
        
        helper('form'); 
    }

    public function index()
    {
        if (session()->get('role') != 'Pengajar') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar',
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('dashboard', $data)
            . view('templates/footer');
    }
    
    public function jadwal()
    {
        if (session()->get('role') !== 'Pengajar') {
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
        return redirect()->to(base_url('pengajar/jadwal'));
    }

    public function editJadwal($id_jadwal)
    {
        $data = [
            'hari' => $this->request->getPost('hari'),
            'pelajaran' => $this->request->getPost('pelajaran')
        ];

        $this->jadwalModel->updateJadwal($data, $id_jadwal);

        session()->setFlashdata('message', '<div class="alert alert-success">Edit data successfully.</div>');
        return redirect()->to(base_url('pengajar/jadwal'));
    }

    public function deleteJadwal()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->jadwalModel->deleteJadwal($id);

        session()->setFlashdata('message', '<div class="alert alert-success">Delete data successfully.</div>');
        return $this->response->setJSON(['success' => true]);
    }
    
    public function soal()
    {
        if (session()->get('role') !== 'Pengajar') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Daftar Soal',
            'data_master' => $this->soalModel->getSoal(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/soal', $data)
            . view('templates/footer');
    }

    public function addSoal()
    {
        $data = [
            'soal' => $this->request->getPost('soal')
        ];

        $this->soalModel->saveSoal($data);

        session()->setFlashdata('message', '<div class="alert alert-success">Add data successfully.</div>');
        return redirect()->to(base_url('pengajar/soal'));
    }

    public function editSoal($id_jadwal)
    {
        $data = [
            'soal' => $this->request->getPost('soal')
        ];

        $this->soalModel->updateSoal($data, $id_jadwal);

        session()->setFlashdata('message', '<div class="alert alert-success">Edit data successfully.</div>');
        return redirect()->to(base_url('pengajar/soal'));
    }

    public function deleteSoal()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->soalModel->deleteSoal($id);

        session()->setFlashdata('message', '<div class="alert alert-success">Delete data successfully.</div>');
        return $this->response->setJSON(['success' => true]);
    }
    
    public function formJawaban($id_soal)
    {
        if (session()->get('role') !== 'Pengajar') {
            return redirect()->to(base_url('login/index'));
        }
        $soal = $this->soalModel->getSoalSingle($id_soal);

        $data = [
            'title' => 'Bimbingan Belajar | Edit Jawaban',
            'data_master' => $this->jawabanModel->getJawaban($id_soal),
            'soal' => $soal
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/jawaban', $data)
            . view('templates/footer');
    }

    public function addJawaban($id_soal)
    {
        if (null !== $this->request->getPost('benar')) $benar = 1;
        else $benar = 0;
        $data = [
            'jawaban' => $this->request->getPost('jawaban'),
            'id_soal' => $id_soal,
            'benar' => $benar
        ];

        $this->jawabanModel->saveJawaban($data);

        session()->setFlashdata('message', '<div class="alert alert-success">Add data successfully.</div>');
        return redirect()->to(base_url('pengajar/formJawaban/'.$id_soal));
    }

    public function editJawaban($id_jawaban, $id_soal)
    {
        if (null !== $this->request->getPost('benar')) $benar = 1;
        else $benar = 0;
        $data = [
            'jawaban' => $this->request->getPost('jawaban'),
            'benar' => $benar
        ];

        $this->jawabanModel->updateJawaban($data, $id_jawaban);

        session()->setFlashdata('message', '<div class="alert alert-success">Add data successfully.</div>');
        return redirect()->to(base_url('pengajar/formJawaban/'.$id_soal));
    }

    public function deleteJawaban()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->jawabanModel->deleteJawaban($id);

        session()->setFlashdata('message', '<div class="alert alert-success">Delete data successfully.</div>');
        return $this->response->setJSON(['success' => true]);
    }
    
    public function materi()
    {
        if (session()->get('role') !== 'Pengajar') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Materi',
            'data_master' => $this->materiModel->getMateri(),
            'pelajaran' => $this->jadwalModel->getJadwal(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/materi', $data)
            . view('templates/footer');
    }

    public function addMateri()
    {
        $data = [
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'judul' => $this->request->getPost('judul')
        ];

        $this->materiModel->saveMateri($data);

        session()->setFlashdata('message', '<div class="alert alert-success">Add data successfully.</div>');
        return redirect()->to(base_url('pengajar/materi'));
    }

    public function editMateri($id_materi)
    {
        $data = [
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'judul' => $this->request->getPost('judul')
        ];

        $this->materiModel->updateMateri($data, $id_materi);

        session()->setFlashdata('message', '<div class="alert alert-success">Edit data successfully.</div>');
        return redirect()->to(base_url('pengajar/materi'));
    }

    public function uploadMateri($id_materi)
    {
        $file = $this->request->getFile('file');

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

            // Simpan nama file ke database
            $data = [
                'file' => $newName
            ];

            $this->materiModel->updateMateri($data, $id_materi); // pastikan method `updateMateri` ada

            session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Upload data successfully. 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');

            return redirect()->to('pengajar/materi');
        } else {
            return redirect()->back()->with('error', $file->getErrorString());
        }
    }


    public function deleteMateri()
    {
        $id = $this->request->getGet('id');
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->materiModel->deleteMateri($id);

        session()->setFlashdata('message', '<div class="alert alert-success">Delete data successfully.</div>');
        return $this->response->setJSON(['success' => true]);
    }
    
    public function tryout()
    {
        if (session()->get('role') !== 'Pengajar') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Hasil Try Out',
            'data_master' => $this->nilaiModel->getNilai(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/nilai', $data)
            . view('templates/footer');
    }

    public function formSoal()
    {
        if (session()->get('role') != 'Pengajar') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar'
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('form/form_soal', $data)
            . view('templates/footer');
    }

    public function addSoal2()
    {
        $db = \Config\Database::connect();

        $data = [
            'soal' => $this->request->getPost('soal')
        ];

        $this->soalModel->saveSoal($data);

        // Ambil id soal yang baru saja dimasukkan
        $id_soal = $this->soalModel->getInsertID();

        // 2. Ambil data jawaban dari form
        $jawabanList = $this->request->getPost('jawaban'); // array
        $benar = $this->request->getPost('benar'); // 1,2,3,4 sesuai radio button

        // 3. Loop untuk simpan ke tabel jawaban
        foreach ($jawabanList as $key => $val) {
            $jawabanData = [
                'id_soal' => $id_soal,
                'jawaban' => $val,
                'benar'   => ($benar == $key) ? 1 : 0
            ];
            $db->table('jawaban')->insert($jawabanData);
        }

        session()->setFlashdata('message', '<div class="alert alert-success">Add data successfully.</div>');
        return redirect()->to(base_url('pengajar/soal'));
    }
}
