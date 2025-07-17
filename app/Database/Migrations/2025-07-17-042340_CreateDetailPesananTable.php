<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailPesananTable extends Migration
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
            'id_pesanan' => [ // Foreign key ke tabel pesanan
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_produk' => [ // Foreign key ke tabel produk
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'jumlah' => [ // Jumlah produk yang dibeli
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'subtotal_harga' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        // Menambahkan foreign key constraints
        $this->forge->addForeignKey('id_pesanan', 'pesanan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_produk', 'produk', 'id', 'CASCADE', 'RESTRICT'); // RESTRICT agar produk tidak bisa dihapus jika ada di pesanan
        $this->forge->createTable('detail_pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_pesanan');
    }
}
