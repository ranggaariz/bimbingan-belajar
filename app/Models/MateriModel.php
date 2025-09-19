<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table = 'materi'; // Nama tabel
    protected $primaryKey = 'id_materi'; // Primary key
    protected $allowedFields = [
        'judul', 'id_jadwal', 'file'
    ]; // Kolom yang diizinkan untuk operasi CRUD

    /**
     * @param array $data
     * @return bool
     */
    public function saveMateri(array $data): bool
    {
        return $this->insert($data);
    }
    
    public function updateMateri(array $data, int $id_soal): bool
    {
        return $this->update($id_soal, $data);
    }

    public function deleteMateri(int $id): bool
    {
        return $this->delete($id);
    }

    public function getMateri()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('materi');

        $builder->select('materi.*, jadwal.pelajaran');
        $builder->join('jadwal', 'jadwal.id_jadwal = materi.id_jadwal');

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    public function getMateriDetail(int $id): ?array
    {
        $db = \Config\Database::connect();
        $builder = $db->table('materi');

        $builder->select('materi.*, jadwal.pelajaran');
        $builder->join('jadwal', 'jadwal.id_jadwal = materi.id_jadwal');
        $builder->where('materi.id_jadwal', $id);

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    public function getSoalSingle(int $id): ?array
    {
        return $this->where('id_soal', $id)->first();
    }

    /**
     * @return array
     */
}
