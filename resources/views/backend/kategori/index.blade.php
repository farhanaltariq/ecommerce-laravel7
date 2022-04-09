@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Kategori</h4>
    @include('common.alert')
    <div class="row">
        <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Kategori Baru</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nama Kategori</label>
                          <input name="nama_kategori" type="text" class="form-control" id="basic-default-fullname" placeholder="Nama Kategori">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Jenis Kategori</label>
                          {{-- <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc."> --}}
                          <select name="jenis_kategori" id="" class="form-select">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Smartphone">Smartphone</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Aksesoris">Aksesoris</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                      </form>
                    </div>
                  </div>
                </div>


                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card">
                <h5 class="card-header">Kategori</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Kategori</th>
                        <th>Parent</th>
                        <th>Created at</th>
                        <th colspan="2" class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach ($kategori as $item)
                      <tr>
                          <td>{{ $no++ }}</td>
                        <td>
                          <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>{{ $item->nama_kategori }}</strong>
                        </td>
                        <td>{{ $item->jenis_kategori }}</td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                              <a class="dropdown-item" href="{{ route('kategori.edit', $item->id) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                              </a>
                        </td>
                        <td>
                          <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
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
                  {{ $kategori->links() }}
                </div>
              </div>
                    </div>
                </div>
</div>

@endsection