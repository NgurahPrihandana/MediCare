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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Spesialis</th>
                        <th>Jumlah Praktik</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Spesialis</th>
                        <th>Jumlah Praktik</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1?>
                    @foreach ($data_spesialis as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->nama_spesialis}}</td>
                        <td>{{$item->count_praktik}}</td>
                        <td>
                            <a href="{{url('/admin/registrasi/detail')}}/{{$item->id_spesialis}}" class="btn btn-primary btn-icon-split">
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
    function del(id) {
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Apakah Anda Yakin Ingin Menghapus ?',
        text: "Data akan di Hapus dari Database",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Cancel',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
            url:"{{url('/admin/spesialis')}}/"+id,
            type:"DELETE",

            data:{
                _token:"{{csrf_token()}}"
            },
            success:function(response) {
                Swal.fire(
                'Success',
                'Data Berhasil Dihapus',
                'success'
                ).then(function() {
                    location.reload();
                });
            },
            error:function(){
                Swal.fire(
                'Gagal',
                'Data Gagal Dihapus',
                'error'
                ).then(function() {
                    // location.reload();
                });
            }

            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            
        }
        })
    }

    function store() {
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Apakah Data Sudah Benar ?',
        text: "Data akan di Simpan di Database",
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Cancel',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
            url:"{{url('/admin/spesialis')}}",
            type:"POST",

            data:{
                _token:"{{csrf_token()}}",
                nama_spesialis:$("#nama_spesialis").val()
            },
            success:function(response) {
                Swal.fire(
                'Success',
                'Data Berhasil Ditambahkan',
                'success'
                ).then(function() {
                    location.reload();
                });
            },
            error:function(){
                Swal.fire(
                'Gagal',
                'Data Gagal Ditambahkan',
                'error'
                ).then(function() {
                    location.reload();
                });
            }

            });
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            
        }
        })
    }
  </script>
@endpush