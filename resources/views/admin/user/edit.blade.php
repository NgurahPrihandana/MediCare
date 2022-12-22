@extends('admin.layouts.main')

@section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Form Edit Data User</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama User</label>
              <input type="text" class="form-control" value="{{$data_user->nama}}" id="nama" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" value="{{$data_user->email}}" id="email">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" value="{{$data_user->username}}" id="username">
            </div>
            <div class="mb-3">
              <label for="old_password" class="form-label">Old Password</label>
              <input type="password" class="form-control" id="old_password">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
              <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
              <input type="tel" class="form-control" value="{{$data_user->nomor_telepon}}" id="nomor_telepon">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" value="{{$data_user->alamat}}" id="alamat">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Role</label>
              <select class="form-control form-select-lg mb-3" id="role" aria-label=".form-select-lg example">
                <option name="role" value="user" {{ $data_user->role === "user" ? 'selected' : '' }} >User</option>
                <option name="role" value="admin" {{ $data_user->role === "admin" ? 'selected' : '' }}>Admin</option>
              </select>
            </div>
            <a href="{{url('/admin/user')}}" class="btn btn-success">Back</a>
            <a onclick="edit({{$data_user->id}})" href="javascript:void(0)" class="btn btn-primary">Edit Data</a>
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
            url:"{{url('/admin/user/edit')}}/"+id,
            type:"PUT",

            data:{
                _token:"{{csrf_token()}}",
                nama:$("#nama").val(),
                nomor_telepon:$("#nomor_telepon").val(),
                email:$("#email").val(),
                username:$("#username").val(),
                old_password:$("#old_password").val(),
                password:$("#password").val(),
                role:$("#role").find(":selected").val(),
                alamat:$("#alamat").val(),
            },
            success:function(response) {
              console.log(response);
                Swal.fire(
                response[0]['title'],
                response[0]['msg'],
                response[0]['type']
                ).then(function() {
                    location.reload();
                });
            },
            error:function(response){
                Swal.fire(
                response[0]['title'],
                response[0]['msg'],
                response[0]['type']
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