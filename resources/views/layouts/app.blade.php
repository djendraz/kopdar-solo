
<!DOCTYPE html>
<html lang="en">

<head>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PP PAUD & Dikmas Jawa Tengah</title>

  <!-- Custom fonts for this template-->
  <link href="{{ Config::get('App.url') }}/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ Config::get('App.url') }}/bootstrap/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ Config::get('App.url') }}/bootstrap/css/sb-admin.css" rel="stylesheet">
  @stack('styles')
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">E-Registration</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control form-control-sm" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary btn-sm" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>



  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link " href="{{ url('/peserta') }}">
          <i class="fas fa-fw fa-print"></i>
          <span>Cetak Tiket</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/sertifikat') }}">
          <i class="fas fa-fw fa-print"></i>
          <span>Cetak Sertifikat</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/koreksi') }}">
          <i class="fas fa-fw fa-book"></i>
          <span>Koreksi Nama</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        @yield('content')

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="{{ Config::get('App.url') }}/bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ Config::get('App.url') }}/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{ Config::get('App.url') }}/bootstrap/vendor/chart.js/Chart.min.js"></script>
  <script src="{{ Config::get('App.url') }}/bootstrap/vendor/datatables/jquery.dataTables.js"></script>
  <script src="{{ Config::get('App.url') }}/bootstrap/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ Config::get('App.url') }}/bootstrap/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="{{ Config::get('App.url') }}/bootstrap/js/demo/datatables-demo.js"></script>
  @stack('scripts')
</body>

</html>
