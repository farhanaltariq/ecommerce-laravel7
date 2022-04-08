@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Kategori</h4>
    <div class="row">
        <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Kategori Baru</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nama Kategori</label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Kategori</label>
                          {{-- <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc."> --}}
                          <select name="kategori" id="" class="form-select">
                              <option value="">Pilih Kategori</option>
                                <option value="">Kategori 1</option>
                                <option value="">Kategori 2</option>
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
                      <tr>
                          <td>1</td>
                        <td>
                          <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                        </td>
                        <td>Jerry Milton</td>
                        <td>
                            22-12-2019
                        </td>
                        <td>
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        </td>
                        <td>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
                    </div>
                </div>
</div>

@endsection