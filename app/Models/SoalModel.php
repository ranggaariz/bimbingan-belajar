<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal'; // Nama tabel
    protected $primaryKey = 'id_soal'; // Primary key
    protected $allowedFields = [
        'soal','id_jadwal'
    ]; // Kolom yang diizinkan untuk operasi CRUD

    public function saveSoal(array $data): bool
    {
        return $this->insert($data);
    }
    
    public function updateSoal(array $data, int $id_soal): bool
    {
        return $this->update($id_soal, $data);
    }

    public function deleteSoal(int $id): bool
    {
        return $this->delete($id);
    }

    public function getSoal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('soal');

        $builder->select('soal.*, jadwal.pelajaran');
        $builder->join('jadwal', 'jadwal.id_jadwal = soal.id_jadwal');
        $builder->groupBy('jadwal.id_jadwal');

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    public function getSoalDetail(int $id): ?array
    {
        $db = \Config\Database::connect();
        $builder = $db->table('soal');

        $builder->select('soal.*, jadwal.pelajaran');
        $builder->join('jadwal', 'jadwal.id_jadwal = soal.id_jadwal');
        $builder->where('soal.id_jadwal', $id);

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    public function getSoalSingle(int $id): ?array
    {
        return $this->where('id_soal', $id)->first();
    }

}
