@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Tambah Produk</h4>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Produk</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Produk</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Deskripsi</label>
                        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
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
                        <select name="kategori" id="" class="form-select">
                            <option value="" disabled selected>Status</option>
                            <option value="">Publish</option>
                            <option value="">Draft1</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Kategori</label>
                        {{-- <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc."> --}}
                        <select name="kategori" id="" class="form-select">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="">Kategori 1</option>
                            <option value="">Kategori 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Harga</label>
                        <input type="number" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Berat</label>
                        <input type="number" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Foto Produk</label>
                        <input type="file" class="form-control" id="basic-default-fullname" >
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                    </form>
                </div>
                </div>
            </div>
    </div>
</div>

@endsection