<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePesananTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [ // Foreign key ke tabel users
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'total_harga' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'status_pesanan' => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu_pembayaran', 'diproses', 'dikirim', 'selesai', 'dibatalkan'],
                'default'    => 'menunggu_pembayaran',
            ],
            'alamat_pengiriman' => [
                'type' => 'TEXT',
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

        $this->forge->addKey('id', true);
        // Menambahkan foreign key constraint ke tabel users
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}
