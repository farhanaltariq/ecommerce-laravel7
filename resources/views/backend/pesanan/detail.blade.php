@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1">Detail Pesanan</h4>
        @include('common.alert')
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Invoice</label>
                        <span class="form-control" id="basic-default-fullname" readonly>{{ $pesanan->invoice_id }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Nama Pelanggan</label>
                        <span class="form-control" disabled readonly >{{ $pesanan->pelanggan->name }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Alamat Pelanggan</label>
                        <textarea class="form-control" disabled readonly >{{ $pesanan->pelanggan->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Produk</label>
                        <span class="form-control" disabled readonly>{{ $pesanan->produk->nama_produk }}</span>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Deskripsi Produk</label>
                        <textarea class="form-control" disabled readonly >{{ $pesanan->produk->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Kategori Produk</label>
                        <span class="form-control" disabled readonly>{{ $pesanan->produk->kategori->nama_kategori }} | {{ $pesanan->produk->kategori->jenis_kategori }}</span>
                        </select>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="col-xl">
                <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Harga Produk</label>
                        <span class="form-control" disabled readonly>Rp. {{ number_format($pesanan->produk->harga) }}</span>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Berat Produk</label>
                        <span class="form-control" disabled readonly>{{ number_format($pesanan->produk->berat) }} gram</span>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jumlah</label>
                        <span class="form-control" id="basic-default-fullname" readonly>{{ $pesanan->qty }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Total Harga</label>
                        <span class="form-control" id="basic-default-fullname" readonly>Rp. {{ number_format($pesanan->total_harga, 2) }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Status</label>
                        <span class="form-control" disabled readonly>{{ $pesanan->status }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Date</label>
                        <input  name="date" type="date" class="form-control" id="basic-default-fullname" value="{{ $pesanan->date }}" disabled readonly>
                    </div>
                    <a href="{{ route('pesanan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                </div>
            </div>
    </div>
</div>

@endsection