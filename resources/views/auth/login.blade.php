@extends('auth/layouts/main')

@section('content')
    <div class="login">
        <div class="container">
            <div class="u-card row">
                <div class="col-lg-6 pl-0 card-img-container">
                    <img src="img/login-banner.png" height="100%" width="100%" alt="">
                </div>
                <div class="col-lg-6 px-5 card-text-container">
                    <h2 class="text-center mt-5">Login</h2>
                    <form class="mt-5" action="/login" method="POST">
                        @csrf
                        <label class="mb-2" for="email">Email</label>
                        <input class="mb-3" type="text" name="email" id="email">
                        <label class="mb-2" for="password">Password</label>
                        <input class="mb-3" type="password" name="password" id="password">
                        <div class="btn-container mt-5">
                            <button type="submit">Log In</button>
                        </div>
                    </form>
                    <p class="mt-5">Don't have an account ? <a class="sign-up-link" href="/register">Sign Up Here</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    @if(session()->has('status'))
        Swal.fire(
        response[0]['title'],
        response[0]['msg'],
        response[0]['type']
        ).then(function() {
            window.location.replace("{{url('/login')}}");
        });
    @endif
    function store() {
        console.log($("#username").val())
        console.log($("#password").val())
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
            url:"/login",
            type:"POST",

            data:{
                _token:"{{csrf_token()}}",
                email:$("#email").val(),
                password:$("#password").val()
            },
            success:function(response) {
                Swal.fire(
                response[0]['title'],
                response[0]['msg'],
                response[0]['type']
                ).then(function() {
                    window.location.replace("{{url('/login')}}");
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