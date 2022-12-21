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
                    <h3 class="mb-2">Dashboard User</h3>
                    <p class="pageheader-text">
                      Proin placerat ante duiullam scelerisque a velit ac porta,
                      fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.
                    </p>
                    <div class="page-breadcrumb">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-link">Dashboard</a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">
                            . . .
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
                <!-- ============================================================== -->
                <!-- four widgets   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total views   -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-inline-block">
                        <h5 class="text-muted">Total Views</h5>
                        <h2 class="mb-0">10,28,056</h2>
                      </div>
                      <div
                        class="float-right icon-circle-medium icon-box-lg bg-info-light mt-1"
                      >
                        <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ============================================================== -->
                <!-- end total views   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total followers   -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-inline-block">
                        <h5 class="text-muted">Total Followers</h5>
                        <h2 class="mb-0">24,763</h2>
                      </div>
                      <div
                        class="float-right icon-circle-medium icon-box-lg bg-primary-light mt-1"
                      >
                        <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ============================================================== -->
                <!-- end total followers   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- partnerships   -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-inline-block">
                        <h5 class="text-muted">Partnerships</h5>
                        <h2 class="mb-0">14</h2>
                      </div>
                      <div
                        class="float-right icon-circle-medium icon-box-lg bg-secondary-light mt-1"
                      >
                        <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ============================================================== -->
                <!-- end partnerships   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total earned   -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-inline-block">
                        <h5 class="text-muted">Total Earned</h5>
                        <h2 class="mb-0">$149.00</h2>
                      </div>
                      <div
                        class="float-right icon-circle-medium icon-box-lg bg-brand-light mt-1"
                      >
                        <i
                          class="fa fa-money-bill-alt fa-fw fa-sm text-brand"
                        ></i>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ============================================================== -->
                <!-- end total earned   -->
                <!-- ============================================================== -->
              </div>
              <!-- ============================================================== -->
              <!-- end content  -->
              <!-- ============================================================== -->
@endsection