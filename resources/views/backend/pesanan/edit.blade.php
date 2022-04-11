@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Update Pesanan</h4>
        @include('common.alert')
        <div class="row">
                    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

            <div class="col-xl">
                <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Pesanan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Nama Pelanggan</label>
                        {{-- <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc."> --}}
                        <select name="pelanggan_id" id="" class="form-select">
                            @foreach($pelanggan as $item)
                                <option value="{{ $item->id }}" {{ $item->id === $pesanan->pelanggan_id ? 'selected' : null }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Produk</label>
                        {{-- <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc."> --}}
                        <select name="produk_id" id="" class="form-select">
                            <option value="" disabled selected>Produk</option>
                            @foreach ($produk as $item)
                                <option value="{{ $item->id }}" {{ $pesanan->produk_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_produk }} | {{ $item->kategori->nama_kategori }} - {{ $item->kategori->jenis_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="Belum dibayar" {{ $pesanan->status === "Belum dibayar"   ? 'selected' : null }}  >Belum Dibayar</option>
                            <option value="Dibayar"       {{ $pesanan->status === "Dibayar"         ? 'selected' : null }}  >Dibayar</option>
                            <option value="Dikirim"       {{ $pesanan->status === "Dikirim"         ? 'selected' : null }}  >Dikirim</option>
                            <option value="Diterima"      {{ $pesanan->status === "Diterima"        ? 'selected' : null }}  >Diterima</option>
                            <option value="Dibatalkan"    {{ $pesanan->status === "Dibatalkan"      ? 'selected' : null }}  >Dibatalkan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jumlah</label>
                        <input  name="qty" type="number" class="form-control" id="basic-default-fullname" value="{{ $pesanan->qty }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Date</label>
                        <input  name="date" type="date" class="form-control" id="basic-default-fullname" value="{{ $pesanan->date }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Pesanan</button>
                    </form>
                </div>
                </div>
            </div>
    </div>
</div>

@endsection