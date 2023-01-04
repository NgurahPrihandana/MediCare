@extends('admin.layouts.main')

@section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Spesialis</h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Tabel Data Spesialis</h6>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Spesialis</th>
                        <th>Jumlah Dokter</th>
                        <th>Jumlah Praktik</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Spesialis</th>
                        <th>Jumlah Dokter</th>
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
                        <td>{{$item->count_doctor}}</td>
                        <td>{{$item->count_praktik}}</td>
                        <td>
                            <a href="{{url('/admin/spesialis/edit')}}/{{$item->id_spesialis}}" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info"></i>
                            </span>
                            <span class="text">Edit</span>
                            </a>
                            <button href="javascript:void(0)" onclick="del({{$item->id_spesialis}})" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Spesialis</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
        <div class="modal-body">
                <div class="mb-3">
                  <label for="nama_spesialis" class="form-label">Nama Spesialis</label>
                  <input type="text" name="nama_spesialis" class="form-control" id="nama_spesialis" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                <a onclick="store()" href="javascript:void(0)" class="btn btn-primary">Tambah Data</a>
            </div>
        </form>
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