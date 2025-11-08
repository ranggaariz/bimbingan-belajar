<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai'; // Nama tabel
    protected $primaryKey = 'id_nilai'; // Primary key
    protected $allowedFields = [
        'id_user', 'benar', 'salah', 'jumlah_soal', 'nilai', 'tanggal', 'id_jadwal'
    ]; // Kolom yang diizinkan untuk operasi CRUD

    /**
     * Simpan data 
     * @param array $data
     * @return bool
     */
    public function saveNilai(array $data): bool
    {
        return $this->insert($data);
    }
    
    public function updateNilai(array $data, int $id_soal): bool
    {
        return $this->update($id_soal, $data);
    }

    public function deleteNilai(int $id): bool
    {
        return $this->delete($id);
    }

    public function getNilai(int $id): array
    {
        $db = \Config\Database::connect();
        $builder = $db->table('nilai');

        $builder->select('nilai.*, tbl_user.nama');
        $builder->join('tbl_user', 'tbl_user.id_user = nilai.id_user');
        $builder->where('nilai.id_jadwal', $id);

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    public function getNilaiPerUser(int $id, int $id_jadwal): ?array
    {
        $db = \Config\Database::connect();
        $builder = $db->table('nilai');

        $builder->select('nilai.*, tbl_user.nama');
        $builder->join('tbl_user', 'tbl_user.id_user = nilai.id_user');
        $builder->where('nilai.id_user', $id);
        $builder->where('nilai.id_jadwal', $id_jadwal);

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }
    
    public function checkCount(int $id_user, int $id_jadwal): ?int
    {
        $count = $this->where('id_user', $id_user)->where('id_jadwal', $id_jadwal)->countAllResults();

        return $count;
    }

    public function getSoalSingle(int $id): ?array
    {
        return $this->where('id_soal', $id)->first();
    }

}
