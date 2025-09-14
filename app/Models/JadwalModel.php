<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal'; // Nama tabel
    protected $primaryKey = 'id_jadwal'; // Primary key
    protected $allowedFields = [
        'hari', 'pelajaran'
    ]; // Kolom yang diizinkan untuk operasi CRUD

    /**
     * Simpan data 
     * @param array $data
     * @return bool
     */
    public function saveJadwal(array $data): bool
    {
        return $this->insert($data);
    }
    
    public function updateJadwal(array $data, int $id_jadwal): bool
    {
        return $this->update($id_jadwal, $data);
    }

    public function deleteJadwal(int $id): bool
    {
        return $this->delete($id);
    }

    public function getJadwal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal');

        $builder->select('*');

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

}
