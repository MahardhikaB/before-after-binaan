<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk'; // Nama tabel
    protected $primaryKey = 'id_produk'; // Primary key

    protected $useTimestamps = true; // Gunakan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_produk', // Foreign key ke tabel users
        'nama_produk',    // Nama produk
        'deskripsi_produk',      // Deskripsi produk
        'harga_produk',          // Harga produk
        'ketersediaan_produk',   // Status ketersediaan
    ];

    /**
     * Mendapatkan semua produk milik user tertentu.
     *
     * @param int $userId
     * @return array
     */
    public function getProdukByUserId(int $userId)
    {
        return $this->where('user_id_produk', $userId)->findAll();
    }
}
