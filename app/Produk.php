<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $id = 'id';
    protected $fillable = [
        'kategori_id', 
        'nama_produk', 
        'deskripsi', 
        'harga', 
        'status', 
        'berat', 
        'foto_produk'
    ];
}
