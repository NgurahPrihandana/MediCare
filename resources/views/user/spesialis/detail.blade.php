@extends('user.layouts.main')

{{-- @section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
@endsection --}}

@section('content')
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="page-header">
                    <h3 class="mb-2">Spesialis</h3>
                    <div class="page-breadcrumb">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-link">Spesialis</a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">
                            Detail
                          </li>
                        </ol>
                      </nav>
                    </div>
                  </div>
                </div>
            </div>
              <!-- ============================================================== -->
              <!-- end pageheader  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- content  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
  
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Tabel Dokter</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dokter</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1?>
                                        @foreach ($data_doctor as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->nomor_telepon}}</td>
                                            <td>{{$item->alamat}}</td>
                                        </tr>
                                        <?php $i++ ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dokter</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Pembatas --}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Tabel Praktik</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dokter</th>
                                            <th>Spesialis</th>
                                            <th>Hari</th>
                                            <th>Waktu Awal</th>
                                            <th>Waktu Akhir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $i = 1?>
                                        @foreach ($data_praktik as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->nama_spesialis}}</td>
                                            <td>{{$item->hari}}</td>
                                            <td>{{$item->waktu_awal}}</td>
                                            <td>{{$item->waktu_akhir}}</td>
                                            <td>
                                                <a href="{{url('/admin/doctor/edit')}}/{{$item->doctor_id}}" class="btn btn-success btn-icon-split">
                                                <span class="text">Daftar</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dokter</th>
                                            <th>Spesialis</th>
                                            <th>Hari</th>
                                            <th>Waktu Awal</th>
                                            <th>Waktu Akhir</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
@endsection