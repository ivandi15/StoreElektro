<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $pesananModel = new PesananModel();
        $userModel = new UserModel();

        $data = [
            'title' => 'Admin Dashboard',
            'total_produk' => $produkModel->countAllResults(),
            'total_pesanan' => $pesananModel->countAllResults(),
            'total_user' => $userModel->where('role', 'user')->countAllResults(),
            'pesanan_terbaru' => $pesananModel->orderBy('created_at', 'DESC')->limit(5)->find()
        ];
        return view('admin/dashboard', $data);
    }
}
