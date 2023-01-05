<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="/assets/vendor/bootstrap/css/bootstrap.min.css"
    />
    <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/libs/css/style.css" />
    <link
      rel="stylesheet"
      href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css"
    />
    <link
      rel="stylesheet"
      href="/assets/vendor/charts/morris-bundle/morris.css"
    />
    <link
      rel="stylesheet"
      href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" type="text/css" href="/assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/datatables/css/buttons.bootstrap4.css">
    @stack('css')
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
      <!-- ============================================================== -->
      <!-- navbar -->
      <!-- ============================================================== -->
      <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
          <a class="navbar-brand" href="index.html">MediCare</a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
              <li class="nav-item dropdown nav-user">
                <a
                  class="nav-link nav-user-img"
                  href="#"
                  id="navbarDropdownMenuLink2"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  ><i class="fas fa-user"></i> Account</a>
                <div
                  class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                  aria-labelledby="navbarDropdownMenuLink2"
                >
                  <div class="nav-user-info">
                    <h5 class="mb-0 text-white nav-user-name">John Abraham</h5>
                  </div>
                  <a class="dropdown-item" href="#"
                    ><i class="fas fa-wrench mr-2"></i>Setting</a
                  >
                  <a class="dropdown-item" href="/logout"
                    ><i class="fas fa-power-off mr-2"></i>Logout</a
                  >
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- ============================================================== -->
      <!-- end navbar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- left sidebar -->
      <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar">
        <div class="menu-list">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav flex-column">
                <li class="nav-divider">Menu</li>
                <li class="nav-item">
                  <a
                    class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}"
                    href="{{url('/user/')}}"
                    ><i class="fa fa-fw fa-user-circle"></i>Dashboard
                    </a
                  >
                </li>
                <li class="nav-divider">Information</li>
                {{-- <li class="nav-item">
                  <a
                    class="nav-link {{ $active === 'jadwal' ? 'active' : '' }}"
                    href="{{url('/user/jadwal')}}"
                    ><i class="fas fa-fw fa-columns"></i> Hari
                  </a>
                </li> --}}
                <li class="nav-item">
                  <a
                    class="nav-link {{ $active === 'spesialis' ? 'active' : '' }}"
                    href="{{url('/user/spesialis')}}"
                    ><i class="fas fa-fw fa-columns"></i> Spesialis
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link {{ $active === 'booking' ? 'active' : '' }}"
                    href="{{url('/user/booking')}}"
                    ><i class="fas fa-fw fa-columns"></i> Booking
                  </a>
                </li>
                <li class="nav-divider">Features</li>
                <li class="nav-item">
                  <a
                    class="nav-link {{ $active === 'daftar-registrasi' ? 'active' : '' }}"
                    href="{{url('/user/daftar')}}"
                    ><i class="fas fa-fw fa-inbox"></i> Daftar Registrasi
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- end left sidebar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- wrapper  -->
      <!-- ============================================================== -->
      <div class="dashboard-wrapper">
        <div class="dashboard-influence">
          <div class="container-fluid dashboard-content">
            @yield('content')
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                Copyright © 2022 Medicare. All rights reserved.
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- end wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="/assets/libs/js/main-js.js"></script>
    <!-- morris-chart js -->
    {{-- <script src="/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="/assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="/assets/vendor/charts/morris-bundle/morrisjs.html"></script> --}}
    <!-- chart js -->
    {{-- <script src="/assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="/assets/vendor/charts/charts-bundle/chartjs.js"></script> --}}
    <!-- dashboard js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/vendor/datatables/js/data-table.js"></script>
    @stack('script')
  </body>
</html>
