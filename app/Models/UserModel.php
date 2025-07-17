<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lengkap', 'email', 'password', 'role', 'alamat', 'no_telepon'];
    protected $useTimestamps = true;
}