<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Data untuk akun admin pertama.
        $data = [
            'nama_lengkap' => 'Administrator',
            'email'        => 'admin1@gmail.com',
            'password'     => password_hash('password123', PASSWORD_DEFAULT),
            'role'         => 'admin',
            'alamat'       => 'Sleman',
            'no_telepon'   => '081314256656',
        ];

        // Menggunakan Query Builder untuk memasukkan data ke tabel 'users'.
        // Ini untuk memastikan data admin hanya dibuat jika email tersebut belum ada.
        $userModel = new \App\Models\UserModel();
        $existingUser = $userModel->where('email', $data['email'])->first();

        if (!$existingUser) {
            $this->db->table('users')->insert($data);
            echo "Admin user created successfully.\n";
        } else {
            echo "Admin user with this email already exists.\n";
        }
    }
}
