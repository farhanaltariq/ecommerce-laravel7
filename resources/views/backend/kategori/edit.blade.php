@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Kategori</h4>
    @include('common.alert')
    <div class="row">
        <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit Kategori</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nama Kategori</label>
                          <input name="nama_kategori" type="text" class="form-control" id="basic-default-fullname" value="{{ $kategori->nama_kategori }}">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Jenis Kategori</label>
                          <select name="jenis_kategori" id="" class="form-select">
                              <option disabled>Pilih Kategori</option>
                              <option value="Smartphone"  {{ ($kategori->jenis_kategori === "Smartphone")  ? 'selected' : ''}}>Smartphone</option>
                              <option value="Elektronik"  {{ ($kategori->jenis_kategori === "Elektronik")  ? 'selected' : ''}}>Elektronik</option>
                              <option value="Laptop"      {{ ($kategori->jenis_kategori === "Laptop"    )  ? 'selected' : ''}}>Laptop</option>
                              <option value="Aksesoris"   {{ ($kategori->jenis_kategori === "Aksesoris" )  ? 'selected' : ''}}>Aksesoris</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Kategori</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection