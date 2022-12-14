@extends('admin.layouts.main')

@section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dokter</h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Form Tambah Data Dokter</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
              <label for="nama_doctor" class="form-label">Nama Doctor</label>
              <input type="text" class="form-control" id="nama_doctor" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
              <input type="number" class="form-control" id="nomor_telepon">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Spesialis</label>
              <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected disabled hidden>Pilih Salah Satu Spesialis</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <a href="{{url('/admin/doctor')}}" class="btn btn-success">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

<!-- Modal -->
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
            url:"/admin/spesialis/"+id,
            type:"DELETE",

            data:{
                _token:"{{csrf_token()}}",
                id:id
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
                    location.reload();
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
            url:"/admin/spesialis",
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