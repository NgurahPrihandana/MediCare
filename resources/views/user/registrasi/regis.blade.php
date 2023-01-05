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
                    <h3 class="mb-2">Praktik</h3>
                    <div class="page-breadcrumb">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-link">Praktik</a>
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
                                  <input id="inputText3" type="text" class="form-control">
  
                              </div>
                              <div class="form-group">
                                  <label for="inputText3" class="col-form-label">Tanggal Lahir</label>
                                  <input id="inputText3" type="date" class="form-control">
  
                              </div>
                              <div class="form-group">
                                  <label for="inputEmail">Jenis Kelamin</label>
                                  <select class="form-control">
                                    <option value="L">Laki - Laki</option>
                                    <option value="L">Perempuan</option>
                                  </select>
  
                              </div>
                              <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Keluhan Pasien</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="inputText3" class="col-form-label">Tanggal Booking</label>
                                <input id="tanggal_booking" type="date" class="form-control">
                            </div>

                            <a onclick="store({{$data_praktik->id_praktik}})" href="/user/registrasi/regis.blade/" class="btn btn-primary">Submit</a>
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

    
  </script>
@endpush
