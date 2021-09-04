<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $allowedFields = ['idkeranjang', 'iduser', 'kodeproduk', 'p', 'l', 'jumlah', 'desain', 'keterangan', 'tambahan'];
    protected $primaryKey = 'idkeranjang';
}