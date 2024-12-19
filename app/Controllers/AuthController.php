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
        
        if ($user['status_verifikasi'] === 'pending') {
            return redirect()->back()->with('error', 'Akun Anda sedang menunggu verifikasi.');
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
        return redirect()->to($user['role'] === 'admin' ? '/admin/dashboard' : '/user/dashboard')->with('success', 'Anda telah Berhasil Login');
    }

    public function register()
{
    // Tangkap data dari form
    $data = $this->request->getPost();

    // Validasi input
    $validation = \Config\Services::validation();

    $validation->setRules([
        'nama_user' => 'required|string|max_length[100]',
        'email' => [
            'rules' => 'required|valid_email|max_length[100]|is_unique[users.email]',
            'errors' => [
                'is_unique' => 'Email telah terdaftar.',
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'min_length' => 'Password harus terdiri dari minimal 8 karakter.',
            ]
        ],
        'nama_perusahaan' => 'required|string|max_length[100]',
        'alamat' => 'required|string',
        'nomor_telepon' => [
            'rules' => 'required|numeric|min_length[10]|max_length[15]',
            'errors' => [
                'min_length' => 'Nomor telepon harus terdiri dari minimal 10 angka.',
                'numeric' => 'Nomor telepon hanya boleh berisi angka.',
            ]
        ],
        'jenis_perusahaan' => 'required|in_list[Ekspor,Importir]',
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

    try {
        // Simpan data user ke tabel `users`
        $userModel = new UserModel();
        $userId = $userModel->insert([
            'nama_user' => $data['nama_user'],
            'email' => $data['email'],
            'role' => 'user', // Default role untuk registrasi
            'password' => $hashedPassword,
            'status_verifikasi' => 'pending', // Status default
        ]);

        if (!$userId) {
            throw new \Exception('Gagal menyimpan data user.');
        }

        $currentDate = date('Y-m-d');

        // Simpan data perusahaan ke tabel `perusahaan`
        $perusahaanModel = new PerusahaanModel();
        $perusahaanModel->insert([
            'user_id_perusahaan' => $userId,
            'nama_perusahaan' => $data['nama_perusahaan'],
            'alamat' => $data['alamat'],
            'telepon' => $data['nomor_telepon'],
            'jenis_perusahaan' => $data['jenis_perusahaan'],
            'pelatihan_mulai' => $currentDate, // Set ke tanggal saat ini
            'pelatihan_selesai' => 'sekarang', // Nilai absolut "sekarang"
        ]);

        // Commit transaksi
        $db->transComplete();

        if ($db->transStatus() === false) {
            throw new \Exception('Registrasi gagal, silakan coba lagi.');
        }
    } catch (\Exception $e) {
        // Rollback transaksi dan tampilkan pesan error
        $db->transRollback();
        return redirect()->back()->with('error', $e->getMessage());
    }

    // Redirect ke halaman login dengan pesan sukses
    return redirect()->to('/login')->with('success', 'Registrasi berhasil. Akun Anda sedang menunggu verifikasi.');
}

    
    // Logout                                                           
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}