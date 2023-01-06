@extends('user.layouts.main')

{{-- @section('page-heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
@endsection --}}

@section('content')
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="page-header">
                    <h3 class="mb-2">Booking</h3>
                    <div class="page-breadcrumb">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-link">Booking</a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">
                            
                          </li>
                        </ol>
                      </nav>
                    </div>
                  </div>
                </div>
            </div>
              <!-- ============================================================== -->
              <!-- end pageheader  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- content  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
  
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="card">
                      <h5 class="card-header">Form Registrasi</h5>
                      <div class="card-body">
                          <form>
                              <div class="form-group">
                                  <label for="inputText3" class="col-form-label">Nama Lengkap Pasien</label>
                                  <input id="inputText3" type="text" id="nama_lengkap" class="form-control">
  
                              </div>
                              <div class="form-group">
                                  <label for="inputText3" class="col-form-label">Tanggal Lahir</label>
                                  <input id="inputText3" type="date" id="tanggal_lahir" class="form-control">
  
                              </div>
                              <div class="form-group">
                                  <label for="inputEmail">Jenis Kelamin</label>
                                  <select class="form-control" id="jenis_kelamin">
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                  </select>
  
                              </div>
                              <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Keluhan Pasien</label>
                                  <textarea class="form-control" id="keluhan" rows="3">
                                    
                                  </textarea>
                              </div>
                              <div class="form-group">
                                <label for="inputText3" class="col-form-label">Tanggal Booking</label>
                                <input id="tanggal_booking" type="date" class="form-control">
                            </div>
                            
                            <a onclick="store({{$data_praktik->id_praktik}},{{session()->get('id')}})" href="/user/registrasi/regis.blade/" class="btn btn-primary">Submit</a>
                          </form>
                      </div>
                  </div>
              </div>
              </div>
@endsection

@push('script')
  <script>
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var d = new Date();
    var dnum = d.getDay();
    console.log(dnum);
    var dayName = days[d.getDay()];

    let date = new Date();
    let sDate = date.getDate();
    while((dnum) !== {{$data_praktik->indexOfDays}} ) {
      sDate++;
      dnum++;
      if(dnum == 7) {
        dnum = 0;
      }
    }
    
    let month = date.getMonth() + 1;
    let year = date.getUTCFullYear();
    if(sDate < 10) {
      sDate = '0' + sDate;
    }

    if(month < 10) {
      month = '0' + month;
    }
    let mindate =  year + '-' + month + '-' + sDate;
    let elem = document.getElementById('tanggal_booking');
    elem.setAttribute('min', mindate);
    elem.setAttribute('step', 7);

    function store() {
        console.log($("#nama_lengkap").val())
        console.log($("#tanggal_lahir").val())
        console.log($("#jenis_kelamin").find(":selected").val())
        console.log($("#keluhan").val())
        console.log($("#tanggal_booking").val())
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
            url:"/user/registrasi/store",
            type:"POST",

            data:{
                _token:"{{csrf_token()}}",
                doctor_id:$("#nama_lengkap").val(),
                doctor_id:$("#tanggal_lahir").val(),
                id_jadwal:$("#jenis_kelamin").find(":selected").val(),
                waktu_awal:$("#keluhan").val(),
                waktu_akhir:$("#tanggal_booking").val(),
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
            result.dismiss === Swal.DismissReason.cancel
        ) {
            
        }
        })
    }

    
  </script>
@endpush
