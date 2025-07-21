<?php
namespace App\Controllers;
use App\Models\UserModel;
class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login', ['title' => 'Login']);
    }
    public function attemptLogin()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $userModel->where('email', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'isLoggedIn' => true,
                'id_user'    => $user['id'],
                'nama'       => $user['nama_lengkap'],
                'email'      => $user['email'],
                'role'       => $user['role'],
            ];
            session()->set($sessionData);
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            }
            return redirect()->to('/');
        }
        return redirect()->back()->withInput()->with('error', 'Email atau password salah.');
    }
    public function register()
    {
        return view('auth/register', ['title' => 'Register']);
    }
    public function attemptRegister()
    {
        $userModel = new UserModel();
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email'        => $this->request->getPost('email'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => 'user' // Default role
        ];
        if ($userModel->save($data)) {
            return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
        }
        return redirect()->back()->withInput()->with('error', 'Registrasi gagal, coba lagi.');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}