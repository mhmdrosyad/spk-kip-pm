<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table      = 'periode';
    protected $primaryKey = 'id';
    protected $allowedFields = ['periode'];

    // Custom method to get all periode
    public function getAllPeriode()
    {
        return $this->findAll();
    }
}
