<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jika user belum login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
