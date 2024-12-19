<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgressModel extends Model
{
    protected $table      = 'progress';     // Nama tabel
    protected $primaryKey = 'id';           // Kolom primary key
    
    // Kolom yang boleh diisi (fillable)
    protected $allowedFields = [
        'id_perusahaan',
        'tanggal_ekspor',
        'nilai_ekspor_rp',
        'nilai_ekspor_usd',
        'negara_ekspor',
        'jenis_ekspor',
        'kuantitas_ekspor',
        'produk_ekspor',
        'bukti_ekspor',
        'nama_importir',
        'created_at',
        'updated_at'
    ];

    // Tanggal yang akan otomatis diatur
    protected $useTimestamps = true; // Untuk mengaktifkan fitur created_at dan updated_at
    
    // Jika kamu ingin mengatur format tanggal secara manual
    // protected $dateFormat = 'datetime';  // defaultnya adalah datetime

    // Menambahkan aturan validasi jika diperlukan
    protected $validationRules = [
        'id_perusahaan'       => 'required|is_natural_no_zero',
        'tanggal_ekspor'      => 'required|valid_date',
        'nilai_ekspor_rp'     => 'required|numeric',
        'nilai_ekspor_usd'    => 'required|numeric',
        'negara_ekspor'       => 'required|max_length[50]',
        'jenis_ekspor'        => 'required|max_length[50]',
        'kuantitas_ekspor'    => 'required',
        'produk_ekspor'       => 'required',
        'bukti_ekspor'        => 'required|string',
        'nama_importir'       => 'required|max_length[255]',
    ];

    // Pesan kesalahan untuk validasi
    protected $validationMessages = [
        'id_perusahaan' => [
            'required' => 'ID perusahaan harus diisi.',
            'is_natural_no_zero' => 'ID perusahaan harus berupa angka yang valid.'
        ],
        'tanggal_ekspor' => [
            'required' => 'Tanggal ekspor harus diisi.',
            'valid_date' => 'Tanggal ekspor harus berupa tanggal yang valid.'
        ],
        'nilai_ekspor_rp' => [
            'required' => 'Nilai ekspor (Rp) harus diisi.',
            'numeric' => 'Nilai ekspor (Rp) harus berupa angka.'
        ],
        'nilai_ekspor_usd' => [
            'required' => 'Nilai ekspor (USD) harus diisi.',
            'numeric' => 'Nilai ekspor (USD) harus berupa angka.'
        ],
        'negara_ekspor' => [
            'required' => 'Negara ekspor harus diisi.',
            'max_length' => 'Negara ekspor maksimal 50 karakter.'
        ],
        'jenis_ekspor' => [
            'required' => 'Jenis ekspor harus diisi.',
            'max_length' => 'Jenis ekspor maksimal 50 karakter.'
        ],
        'kuantitas_ekspor' => [
            'required' => 'Kuantitas ekspor harus diisi.',
            'numeric' => 'Kuantitas ekspor harus berupa teks dan angka.'
        ],
        'produk_ekspor' => [
            'required' => 'Produk ekspor harus diisi.',
        ],
        'bukti_ekspor' => [
            'required' => 'Bukti Ekspor harus diunggah.'
        ],
        'nama_importir' => [
            'required' => 'Nama importir harus diisi.',
            'alpha_numeric' => 'Nama importir harus berupa teks dan angka.',
            'max_length' => 'Nama importir maksimal 255 karakter.'
        ],
    ];

    // Menambahkan pengaturan untuk menghandle waktu secara otomatis
    protected $useSoftDeletes = false; // Jika ingin soft delete, atur menjadi true
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Menambahkan relasi ke tabel perusahaan jika diperlukan
    public function getPerusahaan()
    {
        return $this->join('perusahaan', 'perusahaan.id = progress.id_perusahaan')
                    ->select('perusahaan.*, progress.*')
                    ->findAll();
    }

    public function getProgressByUserId($userId)
{
    return $this->join('perusahaan', 'perusahaan.id_perusahaan = progress.id_perusahaan')
                ->where('perusahaan.user_id_perusahaan', $userId)
                ->select('progress.*, perusahaan.nama_perusahaan')
                ->findAll();
}


    public function getProgress($id = false){
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}