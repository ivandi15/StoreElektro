<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;

class PesananController extends BaseController
{
    public function index()
    {
        $pesananModel = new PesananModel();
        $data = [
            'title' => 'Manajemen Pesanan',
            'pesanan' => $pesananModel
                ->select('pesanan.*, users.nama_lengkap')
                ->join('users', 'users.id = pesanan.id_user')
                ->orderBy('pesanan.created_at', 'DESC')
                ->findAll()
        ];
        return view('admin/pesanan/index', $data);
    }

    public function detail($id)
    {
        $pesananModel = new PesananModel();
        $detailModel = new DetailPesananModel();

        $data = [
            'title' => 'Detail Pesanan',
            'pesanan' => $pesananModel->join('users', 'users.id = pesanan.id_user')->find($id),
            'detail_pesanan' => $detailModel
                ->select('detail_pesanan.*, produk.nama_produk, produk.gambar')
                ->join('produk', 'produk.id = detail_pesanan.id_produk')
                ->where('id_pesanan', $id)
                ->findAll()
        ];
        return view('admin/pesanan/detail', $data);
    }

    public function updateStatus($id)
    {
        $pesananModel = new PesananModel();
        $status = $this->request->getPost('status_pesanan');
        $pesananModel->update($id, ['status_pesanan' => $status]);
        return redirect()->to('/admin/pesanan/' . $id)->with('success', 'Status pesanan berhasil diperbarui.');
    }
}