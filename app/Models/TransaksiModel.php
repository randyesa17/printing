<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['idtransaksi', 'iduser', 'kodeproduk', 'p', 'l', 'jumlah', 'totalharga', 'desain', 'ket', 'kodepos', 'ongkir', 'totalbiaya', 'retur', 'bukti', 'status'];
    protected $primaryKey = 'idtransaksi';
}