<?php namespace App\Models;

use CodeIgniter\Model;

class DaerahModel extends Model
{
    protected $table = 'daerah';
    protected $allowedFields = ['kodepos', 'namadaerah', 'hargakirim'];
    protected $primaryKey = 'kodepos';
}