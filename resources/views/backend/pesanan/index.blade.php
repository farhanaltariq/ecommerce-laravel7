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
                            <button class="btn btn-danger" onclick="show()">Mass Upload</button>
                            <a href="{{ route('pesanan.create') }}" class="btn btn-info">Tambah </a>
                            <a href="{{ route('pesanan.export') }}" class="btn btn-secondary">Export PDF</a> <br>
                            <form action="{{ route('pesanan.import') }}" method="POST" enctype="multipart/form-data" class="text-center" id="hidden-form" style="display: none">
                              @csrf
                              <input type="file" name="file" class="form-control mt-1" style="width: 400px">
                              <button class="btn btn-sm btn-success me-5">Upload !</button>
                            </form>
                            <script>
                              function show(){
                                console.log('show');
                                var hform = document.getElementById('hidden-form');
                                (hform.style.display === 'block') ? hform.style.display = 'none' : hform.style.display = 'block';
                              }
                            </script>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('pesanan.search') }}">
                                <input type="text" class="" name="search" id="" placeholder="Cari . . ." style="width: 50%">
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
                            {{ $item->pelanggan->name ?? null }}
                        </td>
                        <td>Rp. {{ number_format($item->total_harga, 2) }}</td>
                        <td>
                            <span class="btn
                            @php
                              switch($item->status){
                                case "Diterima":
                                  echo 'btn-primary'; break;
                                case "Dibayar":
                                  echo 'btn-success'; break;
                                case "Dikirim":
                                  echo 'btn-info'; break;
                                case "Belum dibayar":
                                  echo 'btn-warning'; break;
                                case "Dibatalkan":
                                  echo 'btn-danger'; break;
                                default:
                                  echo 'btn-secondary'; break;
                              }
                            @endphp">
                              {{ $item->status }}
                            </span>
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