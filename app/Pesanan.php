<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $id = 'id';
    protected $fillable = ['produk_id', 'pelanggan_id', 'invoice_id', 'qty', 'total_harga', 'status', 'date'];

    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'pelanggan_id');
    }
    public function produk(){
        return $this->belongsTo('App\Produk', 'produk_id');
    }
}
