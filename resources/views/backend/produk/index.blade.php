@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Produk</h4>
    @include('common.alert')
    <div class="row">
<div class="col-xl">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card">
                <h5 class="card-header">List Produk</h5>
                <table class="table">
                    <tr>
                        <td>
                            <button class="btn btn-danger">Mass Upload</button>
                            <a href="/produk/create" class="btn btn-info">Tambah</a>
                        </td>
                        <td class="text-end">
                            <form action="">
                                <input type="text" class="" name="" id="" placeholder="Cari . . ." style="width: 50%">
                                <button class="btn btn-secondary">Cari</button>
                            </form>
                        </td>
                    </tr>
                </table>
                <div class="">
                  <table class="table text-start">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th colspan="2" class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($produk as $item)
                      <tr>
                        <td>
                            <img width="40px" width="40px" src="{{ asset('img\/') . $item->foto_produk ?? null }}" alt="avatar" class="rounded-circle" width="40">
                        </td>
                        <td>
                            <pre style="font-family: 'Public Sans'"><strong>{{ $item->nama_produk }}</strong></pre>
                            <pre style="font-family: 'Public Sans'">Kategori  : {{ $item->kategori->nama_kategori ?? null }} | {{ $item->kategori->jenis_kategori ?? null }}</pre>
                            <pre style="font-family: 'Public Sans'">Berat     : {{ $item->berat }} gr  </pre>
                        </td>
                        <td>Rp. {{ number_format($item->harga, 2) }}</td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            <span class="btn btn-{{ $item->status == "Rilis" ? "info" : "secondary" }}">{{ $item->status }}</span>
                        </td>
                        <td>
                              <a class="dropdown-item" href="{{ route('produk.edit', $item->id) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                              </a>
                        </td>
                        <td>
                          <form action="{{ route('produk.destroy', $item->id) }}", method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">
                              <i class="bx bx-trash me-1"></i> Delete
                            </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $produk->links() }}
                </div>
              </div>
                    </div>
                </div>
</div>

@endsection