<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kategori'] = \App\Kategori::orderBy('id', 'DESC')->paginate(7);
        return view('backend.kategori.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'jenis_kategori' => 'required',
        ]);

        // validate duplicate
        $kategori = Kategori::where('nama_kategori', $request->nama_kategori)->Where('jenis_kategori', $request->jenis_kategori)->first();
        if ($kategori) {
            return redirect()->back()->with('error', 'Kategori sudah ada!');
        }

        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->jenis_kategori = $request->jenis_kategori;
        $kategori->save();
        if($kategori){
            return redirect('/kategori')->with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect('/kategori')->with('error', 'Data gagal ditambahkan');
        }

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
        $data['kategori'] = Kategori::find($id);
        return view('backend.kategori.edit', $data);
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
        $request->validate([
            'nama_kategori' => 'required',
            'jenis_kategori' => 'required',
        ]);

        // validate duplicate
        $kategori = Kategori::where('nama_kategori', $request->nama_kategori)->Where('jenis_kategori', $request->jenis_kategori)->first();
        if ($kategori) {
            return redirect('kategori')->with('info', 'Kategori tidak berubah');
        }

        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->jenis_kategori = $request->jenis_kategori;
        $kategori->save();
        if($kategori){
            return redirect('/kategori')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/kategori')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Kategori::destroy($id))
            return redirect('/kategori')->with('success', 'Data berhasil dihapus');
        else
            return redirect('/kategori')->with('error', 'Data gagal dihapus');
            
    }
}
