<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdukTable extends Migration
{
    public function up()
    {
        // Mendefinisikan kolom untuk tabel produk
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'harga' => [
                'type'       => 'INT', // Simpan harga sebagai integer untuk menghindari masalah koma
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '255', // Menyimpan nama file gambar
                'default'    => 'default.jpg',
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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

        // Membuat tabel produk
        $this->forge->createTable('produk');
    }

    public function down()
    {
        // Menghapus tabel produk jika migrasi di-rollback
        $this->forge->dropTable('produk');
    }
}
