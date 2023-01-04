@extends('admin.layouts.main')

@section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Spesialis</h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Form Edit Data Jadwal</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
              <label for="hari" class="form-label">Hari</label>
              <input type="text" name="hari" value="{{$data_jadwal->hari}}" class="form-control" id="hari" autofocus aria-describedby="emailHelp">
            </div>
            <a href="{{url('/admin/jadwal')}}" class="btn btn-success">Back</a>
            <a onclick="edit({{$id_jadwal}})" href="javascript:void(0)" class="btn btn-primary">Edit Data</a>
          </form>
    </div>
</div>

<!-- Modal -->
@endsection

@push('scripts')
  <script>

    function edit(id) {
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Apakah Data Sudah Benar ?',
        text: "Perubahan Data akan di Simpan di Database",
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
            url:"{{url('/admin/jadwal/edit')}}/"+id,
            type:"PUT",

            data:{
                _token:"{{csrf_token()}}",
                hari:$("#hari").val()
            },
            success:function(response) {
                Swal.fire(
                'Success',
                'Data Berhasil Dirubah',
                'success'
                ).then(function() {
                    location.reload();
                });
            },
            error:function(){
                Swal.fire(
                'Gagal',
                'Data Gagal Dirubah',
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