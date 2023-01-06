@extends('admin.layouts.main')

@section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dokter</h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Form Edit Data Dokter</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
              <label for="nama_doctor" class="form-label">Nama Doctor</label>
              <input type="text" value="{{$data_doctor->nama}}" class="form-control" id="nama_doctor" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
              <input type="number" value="{{$data_doctor->nomor_telepon}}" class="form-control" id="nomor_telepon">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" value="{{$data_doctor->username}}" class="form-control" id="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Old Password</label>
              <input type="password" class="form-control" id="old_password">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" value="{{$data_doctor->alamat}}" class="form-control" id="alamat">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" value="{{$data_doctor->email}}" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Spesialis</label>
              <select class="form-control form-select-lg mb-3" id="id_spesialis" aria-label=".form-select-lg example">
                @foreach($data_spesialis as $item)
                    <option value={{$item->id_spesialis}} {{ $data_doctor->id_spesialis === $item->id ? 'selected' : '' }}>{{$item->nama_spesialis}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Spesialis</label>
              <textarea name="" id="biodata" class="form-control">
                  {{$data_doctor->biodata}}
              </textarea>
            </div>
            <a href="{{url('/admin/doctor')}}" class="btn btn-success">Back</a>
            <a onclick="edit({{$data_doctor->doctor_id}})" href="javascript:void(0)" class="btn btn-primary">Edit Data</a>
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
            url:"{{url('/admin/doctor/edit')}}/"+id,
            type:"PUT",

            data:{
                _token:"{{csrf_token()}}",
                nama:$("#nama_doctor").val(),
                nomor_telepon:$("#nomor_telepon").val(),
                email:$("#email").val(),
                username:$("#username").val(),
                old_password:$("#old_password").val(),
                password:$("#password").val(),
                alamat:$("#alamat").val(),
                id_spesialis:$("#id_spesialis").find(":selected").val(),
                biodata:$("#biodata").val(),
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