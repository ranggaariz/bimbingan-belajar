<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanModel extends Model
{
    protected $table = 'jawaban'; // Nama tabel
    protected $primaryKey = 'id_jawaban'; // Primary key
    protected $allowedFields = [
        'jawaban', 'id_soal', 'benar'
    ]; // Kolom yang diizinkan untuk operasi CRUD

    public function saveJawaban(array $data): bool
    {
        return $this->insert($data);
    }
    
    public function updateJawaban(array $data, int $id_jawaban): bool
    {
        return $this->update($id_jawaban, $data);
    }

    public function deleteJawaban(int $id): bool
    {
        return $this->delete($id);
    }

    public function getJawaban(int $id): ?array
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jawaban');

        $builder->select('*')->where('id_soal', $id);

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    public function checkJawaban(int $id_soal, int $id_jawaban): ?array
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jawaban');

        $builder->select('*')->where('id_soal', $id_soal)->where('id_jawaban', $id_jawaban)->where('benar', 1);

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    
}
