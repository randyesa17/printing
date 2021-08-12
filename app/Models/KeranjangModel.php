<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $allowedFields = ['idkeranjang', 'iduser', 'kodeproduk', 'p', 'l', 'jumlah'];
    protected $primaryKey = 'idkeranjang';
}