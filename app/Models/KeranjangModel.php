<?php namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $allowedFields = ['idkeranjang', 'iduser', 'kodeproduk', 'jumlah'];
    protected $primaryKey = 'idkeranjang';
}