<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use Str;
use DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['produk'] = Produk::orderBy('id', 'DESC')->paginate(3);
        return view('backend.produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategori'] = Kategori::all();
        return view('backend.produk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check if all field is set
        foreach($request->all() as $key => $value) {
            if(empty($value)) {
                return redirect()->back()->withInput()->with('error', 'Semua field harus diisi!');
            }
        }
        
        $request->validate([
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'berat' => 'required',
            'foto_produk' => 'required'
        ]);
        
        if($request->foto_produk){
            $foto_produk = $request->foto_produk;
            $str = Str::random(8);
            $getExt = $foto_produk->getClientOriginalExtension();
            $nameFile = $str.'.'.$getExt;
            // $nameFile = $foto_produk->getClientOriginalName();
            $foto_produk->move('img', $nameFile);
            $store = Produk::create(array_merge($request->all(), [
                'foto_produk' => $nameFile,
            ]));
        } else{
            $store = Produk::create($request->all());
        }

        if(!$store)
            return redirect()->route('produk.create')->with('error', 'Data berhasil ditambahkan');
        else
            return redirect()->route('produk.index')->with('success', 'Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['produk'] = Produk::find($id);
        $data['kategori'] = Kategori::all();
        return view('backend.produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // check if all field is set
        if(empty($request->kategori_id) || empty($request->nama_produk) || empty($request->deskripsi) || empty($request->harga) || empty($request->status) || empty($request->berat)) {
            return redirect()->back()->withInput()->with('error', 'Semua field harus diisi!');
        }
        
        $request->validate([
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'berat' => 'required',
            // 'foto_produk' => 'required'
        ]);
        
        if($request->foto_produk){
            $produk = Produk::find($id);
            $foto_produk = $produk->foto_produk;
            $path = public_path('img\/'.$foto_produk);
            if(file_exists($path)){
                unlink($path);
            }
            
            $foto_produk = $request->foto_produk;
            $str = Str::random(8);
            $getExt = $foto_produk->getClientOriginalExtension();
            $nameFile = $str.'.'.$getExt;
            // $nameFile = $foto_produk->getClientOriginalName();
            $foto_produk->move('img', $nameFile);
            $update = Produk::find($id)->update(array_merge($request->all(), [
                'foto_produk' => $nameFile,
            ]));
        } else{
            $update = Produk::find($id)->update($request->all());
        }

        if(!$update)
            return redirect()->route('produk.edit', $id)->with('error', 'Data berhasil diubah');
        else
            return redirect()->route('produk.index')->with('success', 'Data gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete old photo
        $produk = Produk::find($id);
        $foto_produk = $produk->foto_produk;
        $path = public_path('img\/'.$foto_produk);
        if(file_exists($path)){
            unlink($path);
        }
        if(Produk::destroy($id))
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        else
            return redirect()->back()->with('error', 'Data gagal dihapus');
    }
    public function search(Request $request)
    {
        DB::enableQueryLog();
        $data['produk'] = Produk::where('nama_produk', 'ilike', '%'.$request->search.'%')->paginate(3);
        // dd(DB::getQueryLog());
        return view('backend.produk.index', $data);
    }
}
