<?php
namespace App\Controllers;
use App\Models\ProdukModel;

class KeranjangController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Keranjang Belanja',
            'keranjang' => session()->get('keranjang') ?? []
        ];
        return view('user/keranjang', $data);
    }

    public function tambah()
    {
        $produkModel = new ProdukModel();
        $id_produk = $this->request->getPost('id_produk');
        $jumlah = $this->request->getPost('jumlah');
        $produk = $produkModel->find($id_produk);

        if ($produk) {
            $keranjang = session()->get('keranjang') ?? [];
            
            // Jika produk sudah ada di keranjang, update jumlahnya
            if (isset($keranjang[$id_produk])) {
                $keranjang[$id_produk]['jumlah'] += $jumlah;
            } else {
                // Jika belum, tambahkan sebagai item baru
                $keranjang[$id_produk] = [
                    'id'    => $produk['id'],
                    'nama'  => $produk['nama_produk'],
                    'harga' => $produk['harga'],
                    'jumlah'=> $jumlah,
                    'gambar'=> $produk['gambar']
                ];
            }
            session()->set('keranjang', $keranjang);
        }
        return redirect()->to('/keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update()
    {
        $keranjang = session()->get('keranjang') ?? [];
        $items = $this->request->getPost('items');
        
        foreach ($items as $id => $item) {
            if (isset($keranjang[$id])) {
                $keranjang[$id]['jumlah'] = $item['jumlah'];
            }
        }
        session()->set('keranjang', $keranjang);
        return redirect()->to('/keranjang')->with('success', 'Keranjang berhasil diperbarui.');
    }

    public function hapus($id_produk)
    {
        $keranjang = session()->get('keranjang') ?? [];
        if (isset($keranjang[$id_produk])) {
            unset($keranjang[$id_produk]);
        }
        session()->set('keranjang', $keranjang);
        return redirect()->to('/keranjang')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}