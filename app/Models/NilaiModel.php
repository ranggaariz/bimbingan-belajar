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
     * Simpan data cuti baru
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

    public function getNilai()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('nilai');

        $builder->select('nilai.*, tbl_user.nama');
        $builder->join('tbl_user', 'tbl_user.id_user = nilai.id_user');

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
