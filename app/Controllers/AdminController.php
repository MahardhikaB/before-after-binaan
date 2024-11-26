<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $session = session();
        $userData = [
            'nama_user' => $session->get('nama_user'),
            'role' => $session->get('role'),
            'section' => 'dashboard',
            'title' => 'Admin | Dashboard'
        ];
        return view('admin/dashboard', ['user' => $userData]);
    }

    public function detail() {
        $session = session();
        $userData = [
            'nama_user' => $session->get('nama_user'),
            'role' => $session->get('role'),
            'section' => 'detail',
            'title' => 'Admin | Detail Member'
        ];
        return view('admin/member/detail', ['user' => $userData]);
    }

    public function verifikasi() {
        $session = session();
        $userData = [
            'nama_user' => $session->get('nama_user'),
            'role' => $session->get('role'),
            'section' => 'verifikasi',
            'title' => 'Admin | Verifikasi Upload Member'
        ];
        return view('admin/member/verifikasi', ['user' => $userData]);
    }

}