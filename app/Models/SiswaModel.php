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
    // SiswaModel.php
    // SiswaModel.php
    public function deleteSiswaByPeriode($periode)
    {
        $deletedRows = $this->where('id_periode', $periode)->delete();
        log_message('info', 'Deleted Rows: ' . $deletedRows);
        return $deletedRows;
    }
}
