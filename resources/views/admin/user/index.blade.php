@extends('admin.layouts.main')

@section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Tabel Data User</h6>
        <a type="button" class="btn btn-danger" href="{{url('/admin/user/create')}}">
            Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1?>
                    @foreach ($data_user as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->nomor_telepon}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->role}}</td>
                        <td>
                            <a href="{{url('/admin/user/edit')}}/{{$item->id}}" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info"></i>
                            </span>
                            <span class="text">Edit</span>
                            </a>
                            <a href="javascript:void(0)" onclick="del({{$item->id}})" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
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
            url:"{{url('/admin/user')}}/"+id,
            type:"DELETE",

            data:{
                _token:"{{csrf_token()}}",
            },
            success:function(response) {
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
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            
        }
        })
    }
  </script>
@endpush