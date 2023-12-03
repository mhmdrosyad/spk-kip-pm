<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table      = 'hasil';
    protected $allowedFields = ['id', 'nama', 'skor', 'tgl'];

    // Additional configurations...

    // Method to retrieve all hasil data
    public function getAllHasil()
    {
        return $this->findAll();
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
}
