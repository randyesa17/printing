<?php namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $allowedFields = ['kodekaryawan', 'jabatan', 'email', 'nama', 'telp', 'alamat'];
    protected $primaryKey = 'kodekaryawan';
}