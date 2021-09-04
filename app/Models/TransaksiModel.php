<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['idtransaksi', 'iduser', 'idgroup', 'kodeproduk', 'p', 'l', 'jumlah', 'totalharga', 'desain', 'ket', 'tambahan', 'kodepos', 'ongkir', 'totalbiaya', 'bukti', 'status'];
    protected $primaryKey = 'idtransaksi';
}