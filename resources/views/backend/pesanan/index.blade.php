@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Pesanan</h4>
    @include('common.alert')
    <div class="row">
<div class="col-xl">
                <div class="col-xl">
                  <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card">
                <h5 class="card-header">List Pesanan</h5>
                <table class="table">
                    <tr>
                        <td>
                            <button class="btn btn-danger">Mass Upload</button>
                            <a href="{{ route('pesanan.create') }}" class="btn btn-info">Tambah </a>
                            <button class="btn btn-secondary">Export PDF</button> <br>
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
                        <th>Invoice ID</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th class="text-center" colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pesanan as $item)
                      {{-- {{ dd($item->pelanggan) }} --}}
                      <tr>
                        <td>
                            {{ $item->invoice_id }}
                        </td>
                        <td>
                            {{ $item->pelanggan->name }}
                        </td>
                        <td>Rp. {{ number_format($item->total_harga, 2) }}</td>
                        <td>
                            <span class="btn btn-secondary">{{ $item->status }}</span>
                        </td>
                        <td>
                           {{ $item->date }}
                        </td>
                        <td>
                            <a class="dropdown-item" href="{{ route('pesanan.edit', $item->id) }}">
                              <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('pesanan.destroy', $item->id) }}", method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">
                              <i class="bx bx-trash me-1"></i> Delete
                            </button>
                          </form>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $pesanan->links() }}
                </div>
              </div>
                    </div>
                </div>
</div>

@endsection