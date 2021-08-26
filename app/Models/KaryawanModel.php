<?php namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $allowedFields = ['idkaryawan', 'email', 'nama', 'telp', 'alamat'];
    protected $primaryKey = 'idkaryawan';
}