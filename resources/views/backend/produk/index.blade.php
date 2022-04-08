@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Produk</h4>
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
                <div class="table-responsive text-nowrap">
                  <table class="table">
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
                            <img src="{{ $item->foto_produk ?? null }}" alt="avatar" class="rounded-circle" width="40">
                        </td>
                        <td>
                          <table class="table table-borderless">
                          <tr><td colspan="2"><strong>{{ $item->nama_produk }}</strong></td></tr>
                          <tr><td>Kategori</td><td> : {{ $item->kategori_id }} </td></tr>
                          <tr><td>Berat</td> <td>: {{ $item->berat }} </td></tr>
                          </table>
                        </td>
                        <td>{{ $item->harga }}</td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            <span class="btn btn-{{ $item->status == "Rilis" ? "info" : "secondary" }}">{{ $item->status }}</span>
                        </td>
                        <td>
                              <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        </td>
                        <td>
                            <a class="dropdown-item" href=""><i class="bx bx-trash me-1"></i> Delete</a>
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