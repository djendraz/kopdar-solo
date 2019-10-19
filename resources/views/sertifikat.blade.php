@extends('layouts.app')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">
@endpush


@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb bg-info">
	<li class="breadcrumb-item active text-white">Unduh Sertifikat</li>
</ol>
<!-- select2 search auto complete -->
<div class="card-body">
	<div class="form-group">
		<small for="exampleInputEmail1">Masukan Nama/Email/No Hp</small>
		<select class="itemName" style="width: 100%;"></select>
		<small class="text-danger">Setelah kegiatan selesai nama tidak dapat di rubah.</small>
	</div>
</div>
<hr>
<div>
	<div class="card-body">
		<div class="form-group">
			<input class="form-control" type="hidden" id="id" name="id">
			<div class="form-group">
				<label for="exampleInputEmail1">Nama Lengkap</label>
				<input class="form-control form-control-sm" readonly="true" type="text" id="nama" name="nama" style="width:45%">
			</div>
			<button type="submit" class="btn btn-primary btn-sm" onclick="myFunction()">Download Sertifikat</button>
		</div>
		<br>
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
    		url: "{{ url('/getSertifikat') }}",
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
    		url: "{{ url('kehadiran') }}" + '/' + id + "/",
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
			url: "{{ url('sertifikatpdf') }}" + '/' + id + "/",
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