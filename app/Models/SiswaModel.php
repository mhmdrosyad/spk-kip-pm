<?php
// SiswaModel.php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'pemberkasan', 'prestasi', 'status', 'pk_ortu', 'ph_ortu', 'tg_ortu', 'id_periode'];

    // Definisi relasi dengan PeriodeModel
    protected $belongsTo = [
        'periode' => [
            'model' => 'PeriodeModel',
            'foreign_key' => 'id_periode'
        ]
    ];

    // Custom method to get all siswa with periode information
    public function getAllSiswaWithPeriode()
    {
        // Select the fields you want from both tables
        $this->select('siswa.*, periode.periode');

        // Join the 'periode' table based on the 'id_periode' relationship
        $this->join('periode', 'siswa.id_periode = periode.id', 'left');

        // Fetch all data
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
