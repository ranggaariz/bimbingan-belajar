<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'tbl_user'; // Nama tabel
    protected $primaryKey = 'id_user'; // Primary key
    protected $allowedFields = [
        'nama', 'username', 'password', 'role', 'is_active','umur','tingkatan','no_hp','jenis_kelamin','alamat', 'userfile'
    ]; // Kolom yang diizinkan untuk operasi CRUD

    /**
     * Simpan data user baru
     * @param array $data
     * @return bool
     */
    public function saveUser(array $data): bool
    {
        return $this->insert($data);
    }

    /**
     * Ambil semua data user
     * @return array
     */
    public function getUser(): array
    {
        return $this->findAll();
    }

    /**
     * Ambil detail user berdasarkan ID
     * @param int $id_user
     * @return array|null
     */
    public function getUserDetail(int $id_user): ?array
    {
        return $this->where('id_user', $id_user)->first();
    }

    /**
     * Update data user berdasarkan ID
     * @param array $data
     * @param int $id_user
     * @return bool
     */
    public function updateUser(array $data, int $id_user): bool
    {
        return $this->update($id_user, $data);
    }

    /**
     * Hapus user berdasarkan ID
     * @param int $id
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        return $this->delete($id);
    }

    /**
     * Ambil data user yang sedang login
     * @param int $id_user
     * @return array|null
     */
    public function getUserLogin(int $id_user): ?array
    {
        return $this->where('id_user', $id_user)->first();
    }

    public function getDaftarAnggota()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_user');

        $builder->select('*');
        $builder->where([
            'role' => 'Pelajar',
            'is_active' => 0
        ]);

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    public function getAnggota()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_user');

        $builder->select('*');
        $builder->where([
            'role' => 'Pelajar',
            'is_active' => 1
        ]);

        $query = $builder->get();
        return $query->getResult(); // bisa pakai getResultArray() jika mau array asosiatif
    }

    public function countUser()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_user');

        return $builder->countAllResults();
    }

    public function countPendaftar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_user');

        $builder->select('*');
        $builder->where([
            'role' => 'Pelajar',
            'is_active' => 0
        ]);

        return $builder->countAllResults();
    }

    public function countPelajar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_user');

        $builder->select('*');
        $builder->where([
            'role' => 'Pelajar',
            'is_active' => 1
        ]);

        return $builder->countAllResults();
    }

    /**
     * Hitung total cuti
     * @return int
     */
    public function countprofile(): int
    {
        return $this->db->table('tbl_user')->countAllResults();
    }
    
    public function countcuti(): int
    {
        return $this->db->table('tbl_cuti')->countAllResults();
    }
    
    public function counttimeslip(): int
    {
        return $this->db->table('tbl_timeslip')->countAllResults();
    }
    
    public function countseragam(): int
    {
        return $this->db->table('tbl_seragam')->countAllResults();
    }

    public function updateSisaCuti(int $id_user, $sisa_cuti): bool
    {
        return $this->update($id_user, ['sisa_cuti' => $sisa_cuti]);
    }
}
