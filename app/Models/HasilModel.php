<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table = 'hasil';
    protected $allowedFields = ['id', 'nama', 'skor', 'tgl', 'id_periode', 'diterima']; // Tambahkan 'id_periode'

    // Additional configurations...

    // Method to retrieve all hasil data with periode information
    // HasilModel.php
    public function getAllHasilWithPeriode($idPeriode = null)
    {
        $builder = $this->db->table('hasil');

        // Apply periode filter if $idPeriode is provided
        if ($idPeriode !== null) {
            $builder->where('id_periode', $idPeriode);
        }

        // Join with periode table
        $builder->join('periode', 'hasil.id_periode = periode.id', 'left');

        // Fetch all hasil data
        return $builder->get()->getResultArray();
    }

    // Method to insert hasil data
    public function insertHasil($data)
    {
        return $this->insert($data);
    }

    // Method to delete hasil data by ID
    public function deleteHasil($id)
    {
        return $this->delete($id);
    }

    public function deleteHasilByPeriode($idPeriode)
    {
        return $this->where('id_periode', $idPeriode)->delete();
    }
}
