@extends('admin.layouts.main')

@section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Registrasi</h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Tabel Data Spesialis</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTablee" width="100%" cellspacing="0">
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
                            <a href="{{url('/admin/registrasi/detail/user')}}/{{$item->id_spesialis}}/{{$item->id_praktik}}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info"></i>
                            </span>
                            <span class="text">Info</span>
                            </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTablee').DataTable();
        });
    </script>
@endpush