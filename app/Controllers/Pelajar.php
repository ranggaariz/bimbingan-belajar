<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\JadwalModel;
use App\Models\NilaiModel;
use App\Models\SoalModel;
use App\Models\JawabanModel;
use App\Models\MateriModel;

class Pelajar extends BaseController
{
    protected $adminModel;
    protected $jadwalModel;
    protected $nilaiModel;
    protected $soalModel;
    protected $jawabanModel;
    protected $materiModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->jadwalModel = new JadwalModel();
        $this->nilaiModel = new NilaiModel();
        $this->soalModel = new SoalModel();
        $this->jawabanModel = new JawabanModel();
        $this->materiModel = new MateriModel();
        helper('form'); 
    }

    public function index()
    {
        if (session()->get('role') != 'Pelajar') {
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
        if (session()->get('role') !== 'Pelajar') {
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
    
    public function tryout()
    {
        if (session()->get('role') !== 'Pelajar') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Try Out',
            'data_master' => $this->nilaiModel->getNilaiPerUser(session()->get('id_user')),
        ];
        // var_dump($data);die();

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/nilai', $data)
            . view('templates/footer');
    }
    
    public function start()
    {
        if (session()->get('role') !== 'Pelajar') {
            return redirect()->to(base_url('login/index'));
        }
        $tmp = $this->soalModel->getSoal();
        foreach ($tmp as $row) {
            $row->details = $this->jawabanModel->getJawaban($row->id_soal);
        }

        $data = [
            'title' => 'Bimbingan Belajar | Try Out',
            'data_master' => $tmp,
        ];
        // var_dump($data);die();

        return view('templates/header_to', $data)
            // . view('templates/sidebar', $data)
            . view('form/form_tryout', $data)
            . view('templates/footer');
    }

    public function submitTryout()
    {
        $soal = $this->soalModel->getSoal();
        $benar = 0;
        $salah = 0;
        foreach ($soal as $s) {
            // var_dump($this->request->getPost('jawaban'.$s->id_soal));die();
            $jawaban = $this->jawabanModel->checkJawaban($s->id_soal, $this->request->getPost('jawaban'.$s->id_soal));
            if (count($jawaban) > 0) $benar = $benar + 1;
            else $salah = $salah + 1;
        }
        $jumlah_soal = count($soal);
        $nilai = 100 / $jumlah_soal * $benar;
        $data = [
            "id_user" => session()->get('id_user'),
            "benar" => $benar,
            "salah" => $salah,
            "jumlah_soal" => $jumlah_soal,
            "nilai" => $nilai,
            "tanggal" => date("Y-m-d")
        ];

        $this->nilaiModel->saveNilai($data);

        session()->setFlashdata('message', '<div class="alert alert-success">Add data successfully.</div>');
        return redirect()->to(base_url('pelajar/tryout'));
    }
    
    public function materi()
    {
        if (session()->get('role') !== 'Pelajar') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Materi',
            'data_master' => $this->materiModel->getMateri(),
            'pelajaran' => $this->jadwalModel->getJadwal(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/jadwal_materi', $data)
            . view('templates/footer');
    }
    
    public function materiDetail($id_jadwal)
    {
        if (session()->get('role') !== 'Pelajar') {
            return redirect()->to(base_url('login/index'));
        }

        $data = [
            'title' => 'Bimbingan Belajar | Materi',
            'data_master' => $this->materiModel->getMateriDetail($id_jadwal),
            'pelajaran' => $this->jadwalModel->getJadwal(),
        ];

        return view('templates/header', $data)
            . view('templates/sidebar', $data)
            . view('pages/materi', $data)
            . view('templates/footer');
    }
}
