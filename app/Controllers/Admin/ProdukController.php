<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $data = [
            'title' => 'Manajemen Produk',
            'produk' => $produkModel->findAll()
        ];
        return view('admin/produk/index', $data);
    }

    public function new()
    {
        $data = ['title' => 'Tambah Produk Baru'];
        return view('admin/produk/create', $data);
    }

    public function create()
    {
        $produkModel = new ProdukModel();
        
        // Handle file upload
        $gambarFile = $this->request->getFile('gambar');
        $namaGambar = 'default.jpg';
        if ($gambarFile->isValid() && !$gambarFile->hasMoved()) {
            $namaGambar = $gambarFile->getRandomName();
            $gambarFile->move(ROOTPATH . 'public/uploads/produk', $namaGambar);
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
            'kategori'    => $this->request->getPost('kategori'),
            'gambar'      => $namaGambar,
        ];

        $produkModel->save($data);
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produkModel = new ProdukModel();
        $data = [
            'title' => 'Edit Produk',
            'produk' => $produkModel->find($id)
        ];
        return view('admin/produk/edit', $data);
    }

    public function update($id)
    {
        $produkModel = new ProdukModel();
        
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
            'kategori'    => $this->request->getPost('kategori'),
        ];

        // Handle file upload jika ada gambar baru
        $gambarFile = $this->request->getFile('gambar');
        if ($gambarFile->isValid() && !$gambarFile->hasMoved()) {
            // Hapus gambar lama
            $produkLama = $produkModel->find($id);
            if ($produkLama['gambar'] != 'default.jpg' && file_exists(ROOTPATH . 'public/uploads/produk/' . $produkLama['gambar'])) {
                unlink(ROOTPATH . 'public/uploads/produk/' . $produkLama['gambar']);
            }
            
            $namaGambar = $gambarFile->getRandomName();
            $gambarFile->move(ROOTPATH . 'public/uploads/produk', $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $produkModel->update($id, $data);
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        $produkModel = new ProdukModel();
        // Hapus juga file gambarnya
        $produk = $produkModel->find($id);
        if ($produk['gambar'] != 'default.jpg' && file_exists(ROOTPATH . 'public/uploads/produk/' . $produk['gambar'])) {
            unlink(ROOTPATH . 'public/uploads/produk/' . $produk['gambar']);
        }

        $produkModel->delete($id);
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus.');
    }
}
