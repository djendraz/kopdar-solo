@extends('layouts.app')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">
@endpush


@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb bg-info">
    <li class="breadcrumb-item active text-white">Koreksi Nama Dilakukan Sebelum Cetak Sertifikat</li>
</ol>
<!-- select2 search auto complete -->
<div class="card-body">
    <div class="form-group">
        <small for="exampleInputEmail1">Masukan Nama/Email/No Hp</small>
        <select class="itemName" style="width: 100%;"></select>
        <small class="text-danger">Setelah anda melakukan check in anda tidak dapat merubah nama.</small>
    </div>
</div>
<hr>
<div class="card-body">
    <div class="form-group">
        <form method="POST" action="" id="koreksi">
            @csrf
            <input class="form-control" type="hidden" id="id" name="id">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input class="form-control form-control-sm" type="text" id="nama" name="nama" style="width:45%">
                <small id="emailHelp" class="form-text text-muted">Nama akan di gunakan untuk sertifikat</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Unit Kerja</label>
                <input class="form-control form-control-sm" readonly="true" type="text" id="unit_kerja" name="unit_kerja" style="width:45%">
            </div>
            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
        </form>
    </div>
</div>
@stop

@push('scripts')
<script src=" {{ asset('toastr/toastr.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript">
                //Select2 dengan data dari database
                var select = document.getElementById('.itemName');
                $('.itemName').select2({
                    placeholder: 'Masukan Nama No Hp Email',
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
                $(function() {
                    $('#koreksi').on('submit', function(e) {
                        var url = "{{url('koreksi/data')}}";
                        $.ajax({
                            type: 'post',
                            url: url,
                            data: $('#koreksi').serialize(),
                            success: function() {
                                toastr.success('Koreksi Data Berhasil');
                                document.getElementById("id").value = '';
                                document.getElementById("nama").value = '';
                                document.getElementById("unit_kerja").value = '';
                                location.reload();
                            },
                            error: function() {
                                toastr.info('Pastikan anda memasukan nama, Silahkan coba lagi');
                                toastr.error('Koreksi Data Gagal');
                                document.getElementById("id").value = '';
                                document.getElementById("nama").value = '';
                                document.getElementById("unit_kerja").value = '';
                            }
                        });
                        e.preventDefault();
                    });
                });
            </script>
            @endpush