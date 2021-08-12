<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $allowedFields = ['kodeproduk', 'namaproduk', 'harga', 'idsatuan', 'berat', 'keterangan', 'gambar', 'desain1', 'desain2', 'desain3', 'minimal'];
    protected $primaryKey = 'kodeproduk';
}