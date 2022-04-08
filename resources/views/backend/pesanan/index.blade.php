@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Pesanan</h4>
    <div class="row">
<div class="col-xl">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card">
                <h5 class="card-header">Laporan Pesanan</h5>
                <div class="table-responsive text-end text-nowrap me-5">
                    <form action="">
                        <input type="date">
                        <button class="btn btn-secondary">Filter</button>
                        <a href="#" class="btn btn-primary">Export PDF</a>
                    </form>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Invoice ID</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                            ##2283848
                        </td>
                        <td>
                            Nama Pelanggan
                        </td>
                        <td>Rp. 2.599.000</td>
                        <td>
                            <span class="btn btn-secondary">Draft</span>
                        </td>
                        <td>
                            22-12-2019
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