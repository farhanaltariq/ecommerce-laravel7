<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $id = 'id';
    protected $fillable = ['name', 'alamat'];
}
