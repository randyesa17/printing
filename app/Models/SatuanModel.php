<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table = 'satuan';
    protected $allowedFields = ['idsatuan', 'satuan'];
    protected $primaryKey = 'idsatuan';
}