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
                    <h3 class="mb-2">Spesialis</h3>
                    <div class="page-breadcrumb">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-link">Spesialis</a>
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
                        <h5 class="card-header">Tabel Spesialis</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Spesialis</th>
                                            <th>Jumlah Praktik</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1?>
                                        @foreach ($data_spesialis as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{$item->nama_spesialis}}</td>
                                            <td>{{$item->count_praktik}}</td>
                                            <td>
                                                <a href="{{url('/user/spesialis/')}}/{{$item->id_spesialis}}" class="btn btn-primary btn-icon-split">
                                                <span class="text">Detail</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Spesialis</th>
                                            <th>Jumlah Praktik</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
@endsection