@extends('layouts.app')

@push('styles')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">
@endpush


@section('content')
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <h4> Peserta Hadir <a id="kehadiran" class="badge badge-info text-white">{{ $kehadiran }}</a> dari Total Peserta <a class="badge badge-warning text-white"> {{ $peserta }} </a></h4>
  </div>
</div>
<br>
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form id="barcode" name="barcode" method="POST" action="{{ route('kehadiran.store') }}">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Masukan Barcode</label>
        <input type="text" class="id_peserta form-control form-control-sm" name="id_peserta" id="id_peserta" aria-describedby="emailHelp" placeholder="Scan Barcode" autofocus="autofocus" autocomplete="off">
        <small id="emailHelp" class="form-text text-muted">Scan barcode, jika tidak berhasil input manual</small>
      </div>
      <button id="barcodeSubmit" type="submit" class="btn btn-warning btn-sm">Submit</button>
    </form>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
<br>
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-body">
      <table class="table table-hover nowrap" id="dataTable" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Unit Kerja</th>
            <th>Kabupaten/ Kota</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <body>

        </body>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>

@stop

@push('scripts')
<!-- Datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('toastr/toastr.min.js') }}"></script>
<!-- Sweetalert2 -->
<script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
  var table = $('#dataTable').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    searching: true,
    ordering: false,
    "ajax": "{{ route('data.kehadiran') }}",
    "columns": [{
      data: 'id_peserta',
      name: 'id_peserta'
    },
    {
      data: 'nama',
      name: 'nama'
    },
    {
      data: 'unit_kerja',
      name: 'unit_kerja'
    },
    {
      data: 'kabkota',
      name: 'kabkota'
    },
    {
      data: 'status',
      name: 'status'
    },
    {
      data: 'action',
      name: 'action'
    },
    ]
  });
</script>
<script>
  $(function() {
    $('#barcode').on('submit', function(e) {
      var url = "{{route('kehadiran.store')}}";
      $.ajax({
        type: 'post',
        url: url,
        data: $('#barcode').serialize(),
        success: function() {
          toastr.success('Checkin Berhasil');
          table.ajax.reload();
          document.getElementById("id_peserta").focus();
          document.getElementById("id_peserta").value = '';
          count();
        },
        error: function() {
          toastr.info('Id atau Barcode tidak terdaftar, silahkan coba lagi');
          toastr.error('Checkin Gagal');
          document.getElementById("id_peserta").focus();
          document.getElementById("id_peserta").value = '';
        }
      });
      e.preventDefault();
    });

    function count() {
      //Initialize your table
      var table = $('#dataTable').dataTable();
      //Get the total rows
      var row = table.fnGetData().length;
      var count = row + 1;
      document.getElementById("kehadiran").innerHTML = count;
    };
  });
</script>
<script type="text/javascript">
  function deleteData(id){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    Swal({
      title: 'Apa anda yakin?',
      text: "Data yang dihapus tidak bisa dikembalikan!",
      type: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      cancelButtonText: 'Tidak!',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url : "{{ url('kehadiran') }}" + '/' + id,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token, permanent: false},
          success : function(data) {
            count();
            table.ajax.reload();
            swal({
              title: 'Success!',
              text: data.message,
              type: 'success',
              timer: '1500'
            })
          },
          error : function () {
            swal({
              title: 'Oops...',
              text: data.message,
              type: 'error',
              timer: '1500'
            })
          }
        });
      } 
    })
    function count() {
      //Initialize your table
      var table = $('#dataTable').dataTable();
      //Get the total rows
      var row = table.fnGetData().length;
      var count = row - 1;
      document.getElementById("kehadiran").innerHTML = count;
    };
  }
</script>
@endpush