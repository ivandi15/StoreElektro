<?php

namespace App\Controllers;
use App\Models\ProdukModel;

class Home extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $data = [
            'title' => 'Selamat Datang di Toko Elektronik',
            'produk' => $produkModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('user/home', $data);
    }

    public function detail($id)
    {
        $produkModel = new ProdukModel();
        $data = [
            'title' => 'Detail Produk',
            'produk' => $produkModel->find($id)
        ];

        if (empty($data['produk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan.');
        }

        return view('user/detail_produk', $data);
    }
}
