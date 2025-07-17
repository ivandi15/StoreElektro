<?php
namespace App\Controllers;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\ProdukModel;
use App\Models\UserModel;

class PesananController extends BaseController
{
    public function checkout()
    {
        $userModel = new UserModel();
        $data = [
            'title' => 'Checkout',
            'keranjang' => session()->get('keranjang') ?? [],
            'user' => $userModel->find(session()->get('id_user'))
        ];

        if (empty($data['keranjang'])) {
            return redirect()->to('/')->with('error', 'Keranjang Anda kosong.');
        }

        return view('user/checkout', $data);
    }

    public function buatPesanan()
    {
        $keranjang = session()->get('keranjang');
        if (empty($keranjang)) {
            return redirect()->to('/');
        }

        $pesananModel = new PesananModel();
        $detailModel = new DetailPesananModel();
        $produkModel = new ProdukModel();
        $db = \Config\Database::connect();

        $total_harga = 0;
        foreach ($keranjang as $item) {
            $total_harga += $item['harga'] * $item['jumlah'];
        }

        $db->transStart();

        // 1. Simpan ke tabel pesanan
        $id_pesanan = $pesananModel->insert([
            'id_user' => session()->get('id_user'),
            'total_harga' => $total_harga,
            'status_pesanan' => 'menunggu_pembayaran',
            'alamat_pengiriman' => $this->request->getPost('alamat')
        ]);

        // 2. Simpan setiap item ke tabel detail_pesanan dan update stok
        foreach ($keranjang as $item) {
            $detailModel->insert([
                'id_pesanan' => $id_pesanan,
                'id_produk' => $item['id'],
                'jumlah' => $item['jumlah'],
                'subtotal_harga' => $item['harga'] * $item['jumlah']
            ]);

            // Kurangi stok produk
            $produkModel->set('stok', 'stok - ' . $item['jumlah'], false)->where('id', $item['id'])->update();
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Gagal membuat pesanan, silakan coba lagi.');
        }

        // 3. Kosongkan keranjang
        session()->remove('keranjang');

        return redirect()->to('/pesanan/sukses');
    }

    public function sukses()
    {
        return view('user/pesanan_sukses', ['title' => 'Pesanan Berhasil']);
    }
}