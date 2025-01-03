<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LegalitasController extends BaseController
{
    public function index()
    {
        $legalitasModel = new \App\Models\LegalitasModel();
        $legalitas = $legalitasModel->getLegalitasByUserId(session()->get('user_id'));
        return view('legalitas/index', [
            'legalitas' => $legalitas,
        ]);
    }

    public function create()
    {
        return view('legalitas/add_legalitas');
    }

    public function store()
    {
        // dd($this->request->getVar());
        $validation = \Config\Services::validation();
        $validation->setRules([
            'legalitas' => 'required',
            'file_legalitas' => 'uploaded[file_legalitas]|max_size[file_legalitas,4096]|ext_in[file_legalitas,pdf]',
            'tipe' => 'required',
        ], [
            'legalitas' => [
                'required' => 'Jenis legalitas harus diisi.'
            ],
            'file_legalitas' => [
                'uploaded' => 'File legalitas harus diupload.',
                'max_size' => 'Ukuran file legalitas maksimal 4MB.',
                'ext_in' => 'File legalitas harus berformat PDF.'
            ],
            'tipe' => [
                'required' => 'Tipe legalitas harus diisi.'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors_legalitas', $validation->getErrors());
        }
        
        $fileLegalitas = $this->request->getFile('file_legalitas');

        $namaFile = $fileLegalitas->getRandomName();

        $fileLegalitas->move('storage', $namaFile);

        $legalitasModel = new \App\Models\LegalitasModel();

        $tipe = $this->request->getPost('tipe');

        if ($tipe == '0') {
            $legalitasModel->insert([
                'user_id_legalitas' => session()->get('user_id'),
                'legalitas' => $this->request->getPost('legalitas'),
                'file_legalitas' => $namaFile,
                'tipe' => '0',
            ]);
            $legalitasModel->insert([
                'user_id_legalitas' => session()->get('user_id'),
                'legalitas' => $this->request->getPost('legalitas'),
                'file_legalitas' => $namaFile,
                'tipe' => '1',
            ]);
        } else if ($tipe == '1') {
            $legalitasModel->insert([
                'user_id_legalitas' => session()->get('user_id'),
                'legalitas' => $this->request->getPost('legalitas'),
                'file_legalitas' => $namaFile,
                'tipe' => $tipe,
            ]);
        }

        return redirect()->to('user/profile')->with('success_legalitas', 'Legalitas berhasil ditambahkan dan sedang dalam proses verifikasi.');
    }

    public function edit($id_legalitas)
    {
        $legalitasModel = new \App\Models\LegalitasModel();
        $legalitas = $legalitasModel->find($id_legalitas);

        if (!$legalitas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("legalitas dengan ID $id_legalitas tidak ditemukan.");
        }

        return view('legalitas/edit_legalitas', [
            'legalitas' => $legalitas,
        ]);
    }

    public function update($id_legalitas)
    {
        // dd($this->request->getVar());
        $validation = \Config\Services::validation();
        $validation->setRules([
            'legalitas' => 'required',
        ], [
            'legalitas' => [
                'required' => 'Jenis legalitas harus diisi.'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        
        $fileLegalitas = $this->request->getFile('file_legalitas');

        if ($fileLegalitas->getError() == 4) {
            $namaFile = $this->request->getPost('file_legalitas_lama');
        } else {
            $namaFile = $fileLegalitas->getRandomName();
            $fileLegalitas->move('storage', $namaFile);
        }

        $legalitasModel = new \App\Models\LegalitasModel();
        $legalitasModel->update($id_legalitas, [
            'legalitas' => $this->request->getPost('legalitas'),
            'file_legalitas' => $namaFile,
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->to('user/profile')->with('success_legalitas', 'Legalitas berhasil diubah dan sedang dalam proses verifikasi.');   
    }

    public function delete($id_legalitas)
    {
        // dd($id_legalitas);
        $legalitasModel = new \App\Models\LegalitasModel();
        $legalitas = $legalitasModel->find($id_legalitas);

        if (!$legalitas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("legalitas dengan ID $id_legalitas tidak ditemukan.");
        }

        if(!$legalitasModel->isDoubleFileLegalitas($legalitas['file_legalitas'])) {
            if(!empty($legalitas['file_legalitas'])) {
                unlink('storage/' . $legalitas['file_legalitas']);
            }
        }
        
        $legalitasModel->delete($id_legalitas);

        return redirect()->to('user/profile')->with('success_legalitas', 'Legalitas berhasil dihapus.');
    }
}