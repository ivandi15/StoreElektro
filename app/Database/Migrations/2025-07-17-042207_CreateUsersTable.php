<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Mendefinisikan kolom untuk tabel users
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'unique'     => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255', // Untuk menyimpan password yang sudah di-hash
            ],
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default'    => 'user', // Role default saat user mendaftar
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'no_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Menjadikan 'id' sebagai primary key
        $this->forge->addKey('id', true);

        // Membuat tabel users
        $this->forge->createTable('users');
    }

    public function down()
    {
        // Menghapus tabel users jika migrasi di-rollback
        $this->forge->dropTable('users');
    }
}
