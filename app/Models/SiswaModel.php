<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'pemberkasan', 'prestasi', 'status', 'pk_ortu', 'ph_ortu', 'tg_ortu'];

    // Other configurations...

    // Custom method to get all siswa
    public function getAllSiswa()
    {
        return $this->findAll();
    }
}
