<?php
namespace App\Models;
use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_produk', 'deskripsi', 'harga', 'stok', 'gambar', 'kategori'];
    protected $useTimestamps = true;
}