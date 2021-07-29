<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['idtransaksi', 'iduser', 'kodeproduk', 'jumlah', 'totalharga', 'desain', 'kodepos', 'ongkir', 'totalbiaya', 'bukti', 'status'];
    protected $primaryKey = 'idtransaksi';
}