<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Pelanggan;
use App\Pesanan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['omset'] = Pesanan::sum('total_harga');
        $data['customer'] = Pelanggan::count();
        $data['category'] = Kategori::count();
        $data['product'] = Produk::count();
        $data['new_order'] = Pesanan::where('status', '=', 'Belum dibayar')->count();
        $data['processed_order'] = Pesanan::where('status', '=', 'Dibayar')->count();
        $data['sent_order'] = Pesanan::where('status', '=', 'Dikirim')->count();
        $data['done_order'] = Pesanan::where('status', '=', 'Diterima')->count();
        // dd($data);
        return view('dashboard', $data);
    }
}
