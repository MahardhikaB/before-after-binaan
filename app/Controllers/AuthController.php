<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PerusahaanModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['url', 'form']);
    }

    // Menampilkan form login
    public function loginForm()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(session()->get('role') === 'admin' ? '/admin/dashboard' : '/user/dashboard');
        }
        return view('auth/login');
    }

    public function registerForm(): string
    {
        return view('auth/registrasi');
    }

    // Proses login
    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
    
        if (!$user) {
            // Jika email tidak ditemukan
            return redirect()->back()->withInput()->with('error', 'Email tidak ditemukan.');
        }
    
        if (!password_verify($password, $user['password'])) {
            // Jika password salah
            return redirect()->back()->withInput()->with('error', 'Password salah.');
        }
    
        // Jika berhasil login
        session()->set([
            'user_id' => $user['user_id'],
            'nama_user' => $user['nama_user'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ]);
    
        // Tambahkan pesan sukses
        session()->set('success', 'Berhasil login! Selamat datang, ' . $user['nama_user'] . '.');
    
        // Redirect berdasarkan role
        return redirect()->to($user['role'] === 'admin' ? '/admin/dashboard' : '/user/dashboard');
    }

    public function register()
    {
        // Tangkap data dari form
        $data = $this->request->getPost();

        // Validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_user' => 'required|string|max_length[100]',
            'email' => 'required|valid_email|max_length[100]|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'nama_perusahaan' => 'required|string|max_length[100]',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|numeric|min_length[10]|max_length[15]',
            'jenis_perusahaan' => 'required|string|max_length[100]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Kembali ke form dengan pesan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Hash password
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        // Buat transaksi untuk menyimpan ke dua tabel
        $db = \Config\Database::connect();
        $db->transStart();

        // Simpan data user ke tabel `users`
        $userModel = new UserModel();
        $userId = $userModel->insert([
            'nama_user' => $data['nama_user'],
            'email' => $data['email'],
            'role' => 'user', // Default role untuk registrasi
            'password' => $hashedPassword,
        ]);

        // Simpan data perusahaan ke tabel `perusahaan`
        $perusahaanModel = new PerusahaanModel();
        $perusahaanModel->insert([
            'user_id_perusahaan' => $userId,
            'nama_perusahaan' => $data['nama_perusahaan'],
            'alamat' => $data['alamat'],
            'telepon' => $data['nomor_telepon'],
            'jenis_perusahaan' => $data['jenis_perusahaan'],
        ]);

        // Commit transaksi
        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Registrasi gagal, silakan coba lagi.');
        }

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
    
    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}