<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'nama_produk', 'keterangan', 'harga', 'jumlah'];
}
