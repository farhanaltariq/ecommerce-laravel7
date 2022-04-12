<?php

namespace App\Imports;

use App\Pesanan;
use Maatwebsite\Excel\Concerns\ToModel;

class PesananImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pesanan([
            'produk_id' => $row[0],
            'pelanggan_id' => $row[1],
            'invoice_id' => $row[2],
            'qty' => $row[3],
            'total_harga' => $row[4],
            'status' => $row[5],
            'date' => $row[6],
        ]);
    }
}
