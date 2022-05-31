@extends('dashboard.layouts.main')

@section('content')
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <h4 class="card-title">Pengajuan Barang</h4>

		  @if(session()->has('succes'))
		  <div class="alert alert-success" id="succes-alert" role="alert">
			  {{session('succes')  }}
		  </div>
		  @endif
		<!-- Button trigger modal -->
		<div class="row">
			<div class="col-lg-12">
				<div class="mb-3 row">
					{{-- <label for="nama" class="col-lg-2 col-form-label">Tanggal Transaksi  </label> --}}
					<div class="col-lg-9">
						{{-- <input type="date" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror"  id="tgl"  value="{{ old('tgl_masuk') }}"> --}}
						<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#Pengajuan">
							Tambah Barang
						</button>
					</div>
					{{-- <label for="nama" class="col-lg-  col-form-label"></label> --}}
					<div class="col-lg-3"> 
						{{-- @foreach ($pengajuans as $pengajuan)	 --}}
						<a href="/dashboard/pengajuan/cetak_PDF" target="_blank"
							title="Cetak nota" class="btn btn-outline-success mb-0"><i class="ti-printer">PDF</i>
						</a>
						<a href="/dashboard/pengajuan/cetak_PDF" target="_blank"
							title="Cetak nota" class="btn btn-outline-success mb-0"><i class="ti-printer">Excel</i>
						</a>
						{{-- @endforeach --}}
				</div> 
				</div>
			</div>
		</div>
		
			<div class="table-responsive mt-1">
				<table class="table" id="order-listing">
				<thead>
					<tr>
					<th class="sortStyle">No</th>
					<th>Nama Pengajuan</th>
					<th>Nama Barang</th>
					<th>Tanggal Pengajuan</th>
					<th>Qty</th>
					{{-- <th>Harga</th> --}}
					<th>Terpenuhi</th>
					{{-- <th>Cetak</th> --}}
					<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pengajuans as $pengajuan)		  
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $pengajuan->pelanggan->nama }}</td>
						<td>{{ $pengajuan->nama_barang }}</td>
						<td>{{ date('d/m/Y', strtotime($pengajuan->tgl_pengajuan)) }}</td>
						<td>{{ $pengajuan->qty }}</td>
						{{-- <td>Rp. {{ number_format($pengajuan->harga_jual) }}</td> --}}
						<td>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input ditarik" id="customSwitch1" {{ $cek = ($pengajuan->status == 1? "checked" : " ") }}>
								<label class="custom-control-label" for="customSwitch1"></label>
							  </div>
						</td>
						<td>
							@include('dashboard.pengajuan.edit')
							<form action="/dashboard/pengajuan/{{ $pengajuan->id }}" class="d-inline" method="post">
								@csrf
								@method('DELETE')
								<button type="submit" class="badge badge-danger border-0" onclick="return confirm('Yakin Ingin Dihapus')"><i class="ti-trash"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
	  		</div>
			  {{-- <div class="row justify-content-end mt-3">
				{{ $barangs->links() }}
			</div> --}}
		</div>
	</div>
</div>
	@include('dashboard.pengajuan.create')
	@endsection

	@push('script')
	<script>
			(function($) {
		'use strict';
		$(function() {
			$('#order-listing').DataTable({
			"aLengthMenu": [
				[5, 10, 15, -1],
				[5, 10, 15, "All"]
			],
			"iDisplayLength": 10,
			"language": {
				search: ""
			}
			});
			$('#order-listing').each(function() {
			var datatable = $(this);
			// SEARCH - Add the placeholder for Search and Turn this into in-line form control
			var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
			search_input.attr('placeholder', 'Search');
			search_input.removeClass('form-control-sm');
			// LENGTH - Inline-Form control
			var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
			length_sel.removeClass('form-control-sm');
			});
		});
		})(jQuery);


		$('#order-listing').on('click' , '.ditarik' , function(){
			let no = $(this).closest('tr').find('td:eq(0)').text()
			let checked = ($(this).closest('tr').find('.ditarik').is(':checked')?1:0)
			let data = {
								id:no,
								status: checked,
								_token: "{{ csrf_token() }}"
								};
			$.post('{{ route("dipenuhi") }}', data, function(msg){
				alert(msg)
			})
		})	

	</script>	
	@endpush