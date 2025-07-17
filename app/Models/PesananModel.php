<?php
namespace App\Models;
use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'total_harga', 'status_pesanan', 'alamat_pengiriman'];
    protected $useTimestamps = true;
}