<?php
// SiswaModel.php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'pemberkasan', 'prestasi', 'status', 'pk_ortu', 'ph_ortu', 'tg_ortu'];

    public function getAllSiswaWithPeriode()
    {
        return $this->findAll();
    }
}
