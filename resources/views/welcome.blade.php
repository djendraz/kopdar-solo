@extends('layouts.app')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">
@endpush


@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb bg-info">
    <li class="breadcrumb-item active text-white">Unduh Tiket</li>
</ol>
@if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif
<!-- select2 search auto complete -->
<div class="card-body">
    <div class="form-group">
        <small for="exampleInputEmail1">Masukan Nama/Email/No Hp</small>
        <select class="itemName" style="width: 100%;"></select>
        <small class="text-danger">Setelah anda chek in anda tidak dapat merubah nama.</small>
    </div>
</div>

<hr>
<div>
    <div class="card-body">
        <form method="POST" action="{{ route('generatePDF') }}">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" id="id" name="id">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input class="form-control form-control-sm" readonly="true" type="text" id="nama" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Unit Kerja</label>
                    <div class="col-sm-10">
                        <input class="form-control form-control-sm" readonly="true" type="text" id="unit_kerja" name="unit_kerja">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Download Tiket</button>
            </div>
        </form>
    </div>
    <br>
    <div class="card" style="width: 18rem;">
        <div class="card-body bg-info text-white">
            <h5 class="card-title">INFORMASI</h5>
            <p class="card-text">Jika Nama tidak sesuai, silahkan rubah data pada menu Koreksi Data karena nama akan di gunakan untuk Sertifikat. Biodata dan Tanda Terima ATK harap dibawa saat registrasi di Lokasi.</p>
        </div>
    </div>
</div>
@stop

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<script src=" {{ asset('toastr/toastr.min.js') }}"></script>
<script type="text/javascript">
    //Select2 dengan data dari database
    var select = document.getElementById('.itemName');
    $('.itemName').select2({
        placeholder: 'Masukan Nama/No Hp/Email',
        ajax: {
            url: "{{ url('/getData') }}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.id,
                            html: '<div class="row"><div class="col-md-4"><b>Nama : </b> ' + item.nama + '</div><div class="col-md-4"><b>Email : </b> ' + item.email + '</div><div class="col-md-4"><b>No Hp : </b> ' + item.no_hp + '</div></div>',
                            id: item.id
                        }
                    })
                };
            },
        },
        language: {
            noResults: function() {
                return "<a href='#' class='btn btn-info btn-sm'>Daftar</a> Data tidak ditemukan ";
            }
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateResult: function(data) {
            return data.html;
        },
        templateSelection: function(data) {
            return data.nama;

        }
    });
    $('.itemName').on('select2:select', function(e) {
        var id = $(".itemName").val();
        $.ajax({
            url: "{{ url('peserta') }}" + '/' + id + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#unit_kerja').val(data.unit_kerja);
                $('#no_hp').val(data.no_hp);
            },
            error: function() {
                toastr.error('Data tidak ditemukan');
            }
        });
    });
</script>

<script>
    function myFunction() {
        var id = document.getElementById("id").value;
        $.ajax({
            url: "{{ url('pdf') }}" + '/' + id + "/",
            type: "GET",
            success: function() {
                toastr.success('Download dalam proses');
            },
            error: function() {
                toastr.info('Data tidak ditemukan, Silahkan masukan nama');
            }
        });
    }
</script>
@endpush