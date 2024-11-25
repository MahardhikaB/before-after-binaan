<?php

namespace App\Models;

use CodeIgniter\Model;

class LegalitasModel extends Model
{
    protected $table = 'legalitas';
    protected $primaryKey = 'id_legalitas';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_legalitas', // Foreign key ke tabel users
        'legalitas_awal',
        'legalitas_akhir',
    ];

    /**
     * Mendapatkan legalitas berdasarkan user_id.
     *
     * @param int $userId
     * @return array|null
     */
    public function getLegalitasByUserId(int $userId)
    {
        return $this->where('user_id_legalitas', $userId)->first();
    }

    /**
     * Menambahkan atau memperbarui legalitas untuk user tertentu.
     *
     * @param int   $userId
     * @param array $data
     * @return bool
     */
    public function saveLegalitasForUser(int $userId, array $data): bool
    {
        $existingLegalitas = $this->getLegalitasByUserId($userId);

        if ($existingLegalitas) {
            // Update jika sudah ada
            return $this->update($existingLegalitas['id_legalitas'], $data);
        }

        // Tambahkan jika belum ada
        $data['user_id_legalitas'] = $userId;
        return $this->save($data);
    }
}
