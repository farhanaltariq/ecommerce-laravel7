@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Update Produk</h4>
        @include('common.alert')
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Produk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Produk</label>
                        <input name="nama_produk" type="text" class="form-control" id="basic-default-fullname" placeholder="Nama Produk" value="{{ $produk->nama_produk }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Deskripsi</label>
                        <textarea name="deskripsi" id="editor" cols="30" rows="10" class="form-control" placeholder="Deskripsi">{{ $produk->deskripsi }}</textarea>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xl">
                <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Status</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Status</label>
                        {{-- <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc."> --}}
                        <select name="status" id="" class="form-select">
                            <option value="" disabled selected>Status</option>
                            <option value="Rilis" {{ $produk->status === 'Rilis' ? 'selected' : '' }}>Rilis</option>
                            <option value="Draft" {{ $produk->status === 'Draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Kategori</label>
                        {{-- <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc."> --}}
                        <select name="kategori_id" id="" class="form-select">
                            <option value="" disabled selected>Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ $produk->kategori_id == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori . ' | ' . $item->jenis_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Harga</label>
                        <input name="harga" type="number" class="form-control" id="basic-default-fullname" placeholder="Harga (Rp)" value="{{ $produk->harga }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Berat</label>
                        <input name="berat" type="number" class="form-control" id="basic-default-fullname" placeholder="Berat (gr)" value="{{ $produk->berat }}">
                    </div>
                    <div class="mb-3">
                        @if(!empty($produk->foto_produk))
                            <img width="70px" height="70px" src="{{ asset('img\/') . $produk->foto_produk }}" alt="">
                        @else
                            <label class="form-label" for="basic-default-fullname">Foto Produk</label>
                        @endif  
                        <input name="foto_produk" type="file" class="form-control" id="basic-default-fullname" placeholder="{{ $produk->foto_produk }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                    </form>
                </div>
                </div>
            </div>
    </div>
</div>

@endsection