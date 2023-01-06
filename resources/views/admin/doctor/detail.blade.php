@extends('admin.layouts.main')

@section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Dokter</h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Data Dokter</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
              <label for="nama_doctor" class="form-label">Nama Doctor</label>
              <input type="text" class="form-control" id="nama_doctor" value="{{$data_doctor->nama}}" disabled aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
              <input type="number" class="form-control" value="{{$data_doctor->nomor_telepon}}" disabled id="nomor_telepon">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" value="{{$data_doctor->username}}" disabled id="username">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" value="{{$data_doctor->alamat}}" disabled id="alamat">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" value="{{$data_doctor->email}}" disabled id="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Spesialis</label>
              <input type="text" class="form-control" value="{{$data_doctor->nama_spesialis}}" disabled id="spesialis">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Biodata</label>
                <textarea name="" id="biodata" disabled class="form-control">
                    {{$data_doctor->biodata}}
                </textarea>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Tabel Data Praktik</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Hari</th>
                        <th>Waktu Awal</th>
                        <th>Waktu Akhir</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Hari</th>
                        <th>Waktu Awal</th>
                        <th>Waktu Akhir</th>
                    </tr>
                </tfoot>
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
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
