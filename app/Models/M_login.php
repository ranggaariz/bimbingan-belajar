<?php

namespace App\Models;

use CodeIgniter\Model;

class M_login extends Model
{
    protected $table = 'tbl_user'; // Nama tabel
    protected $primaryKey = 'id_user'; // Primary key tabel
    protected $allowedFields = [
        'nama', 'username', 'password', 'role', 'is_active','umur','tingkatan','no_hp','jenis_kelamin','alamat', 'userfile', 'email'
    ]; // Kolom yang diizinkan untuk diisi

    /**
     * Mengecek login berdasarkan username dan password
     */
    public function cek_users($username, $password)
    {
        $user = $this->where('username', $username)->first();
        $user = $this->db->table('tbl_user')->where('username', $username)->get()->getRow();

        if ($user && $password == $user->password) {
        // if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    /**
     * Aturan validasi untuk pendaftaran user
     */
    public function rules_user()
    {
        return [
            'nama'     => 'required|trim',
            'username' => 'required|trim|min_length[5]',
            'password' => 'required|min_length[8]',
        ];
    }

    /**
     * Menyimpan data user baru
     */
    public function saveUser($data)
    {
        return $this->insert($data);
    }

    /**
     * Mengecek user berdasarkan NIP
     */
    public function cek_user($nip)
    {
        return $this->where('nip', $nip)->first();
    }

    /**
     * Memperbarui password user
     */
    public function updatePass($nip, $newPassword)
    {
        $data = [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT), // Hash password untuk keamanan
        ];

        return $this->update(['nip' => $nip], $data);
    }
}
