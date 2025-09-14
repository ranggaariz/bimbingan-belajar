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

    /**
     * Simpan data cuti baru
     * @param array $data
     * @return bool
     */
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

    /**
     * Ambil semua data cuti dengan relasi ke user
     * @return array
     */
    public function getCuti(): array
    {
        return $this->select('tbl_cuti.*, tbl_user.name as user_name, tbl_user.email as user_email')
            ->join('tbl_user', 'tbl_user.id_user = tbl_cuti.id_user')
            ->orderBy('tbl_cuti.id_cuti','DESC')
            ->findAll();
    }

    /**
     * Ambil detail cuti berdasarkan ID dengan relasi ke user
     * @param int $id_cuti
     * @return array|null
     */
    public function getCutiDetail(int $id_cuti): ?array
    {
        return $this->select('tbl_cuti.*, tbl_user.name as user_name, tbl_user.email as user_email')
            ->join('tbl_user', 'tbl_user.id_user = tbl_cuti.id_user')
            ->where('tbl_cuti.id_cuti', $id_cuti)
            ->first();
    }

    /**
     * Hapus cuti berdasarkan ID
     * @param int $id
     * @return bool
     */
    public function deleteCuti(int $id): bool
    {
        return $this->delete($id);
    }

    /**
     * Approve cuti oleh Supervisor
     * @param int $id_cuti
     * @return bool
     */
    public function approveCutiSpv(int $id_cuti): bool
    {
        return $this->update($id_cuti, ['status' => 'Supervisor']);
    }

    /**
     * Approve cuti oleh HRD
     * @param int $id_cuti
     * @return bool
     */
    public function approveCutiHRD(int $id_cuti): bool
    {
        return $this->update($id_cuti, ['status' => 'HRD']);
    }

    /**
     * Tolak cuti oleh Supervisor
     * @param int $id_cuti
     * @return bool
     */
    public function rejectSpv(int $id_cuti, $note): bool
    {
        return $this->update($id_cuti, ['status' => 'RejectSpv', 'note' => $note]);
    }

    /**
     * Tolak cuti oleh HRD
     * @param int $id_cuti
     * @return bool
     */
    public function rejectHRD(int $id_cuti): bool
    {
        return $this->update($id_cuti, ['status' => 'RejectHRD']);
    }
}
