@extends('auth/layouts/main')

@section('body')
    <body class="register">
    <div class="container">
        <div class="u-card row">
            <div class="col-lg-6 pl-0 card-img-container">
                <img src="img/login-banner.png" height="100%" width="100%" alt="">
            </div>
            <div class="col-lg-6 px-5 card-text-container">
                <h2 class="text-center mt-5">Register</h2>
                <form class="mt-5" action="/register" method="POST">
                    @csrf
                    <label class="mb-2" for="nama">Nama</label>
                    <input class="mb-3" type="text" name="nama" id="nama">
                    <label class="mb-2" for="username">Username</label>
                    <input class="mb-3" type="text" name="username" id="username">
                    <label class="mb-2" for="address">Adress</label>
                    <input class="mb-3" type="text" name="alamat" id="address">
                    <label class="mb-2" for="phone">Phone</label>
                    <input class="mb-3" type="tel" name="nomor_telepon" id="phone">
                    <label class="mb-2" for="email">Email</label>
                    <input class="mb-3" type="email" name="email" id="email">
                    <label class="mb-2" for="password">Password</label>
                    <input class="mb-3" type="password" name="password" id="password">
                    <input class="mb-3" type="hidden" name="role" value="user" id="role">
                    <div class="btn-container mt-5">
                        <button type="submit">Sign Up</button>
                    </div>
                </form>
                <p class="mt-5">Do you already have an account ? <a class="sign-up-link" href="/login">Login Here</a></p>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>

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
                url:"/register",
                type:"POST",
    
                data:{
                    _token:"{{csrf_token()}}",
                    nama:$("#nama").val(),
                    nomor_telepon:$("#nomor_telepon").val(),
                    email:$("#email").val(),
                    username:$("#username").val(),
                    password:$("#password").val(),
                    role:$("#role").val(),
                    alamat:$("#alamat").val(),
                },
                success:function(response) {
                    Swal.fire(
                    response[0]['title'],
                    response[0]['msg'],
                    response[0]['type']
                    ).then(function() {
                        // location.reload();
                    });
                },
                error:function(){
                    Swal.fire(
                    response[0]['title'],
                    response[0]['msg'],
                    response[0]['type']
                    ).then(function() {
                        // location.reload();
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
    </body>

    
@endsection