<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password']; // Sesuaikan dengan kolom yang Anda miliki

    public function findByUsername($username)
    {
        return $this->where('username', $username)
            ->first();
    }
}
