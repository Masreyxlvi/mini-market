@extends('dashboard.layouts.main')

@section('content')
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <h4 class="card-title">Laporan Pembelian</h4>
			@if($errors->any())
				<div class="alert alert-danger" role="alert" id="error-alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

		  @if(session()->has('succes'))
		  <div class="alert alert-success" id="succes-alert" role="alert">
			  {{session('succes')  }}
		  </div>
		  @endif
			<!-- Button trigger modal -->
		
			{{-- <a href="/dashboard/pembelian/create"  class="btn btn-primary" >Create Pembelian</a> --}}

				<div class="table-responsive mt-3" >
					<table class="table" id="order-listing"> 
					<thead>
						<tr class="bg-dark text-white">
						<th class="sortStyle">Kode Masuk</th>
						<th>Nama Pemasok</th>
						<th>Nama User</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($pembelis as $key => $pembeli)		
						<tr>
							<td>{{ $pembeli->kode_masuk }}</td>
							<td>{{ $pembeli->pemasok->nama_pemasok }}</td>
							<td>{{ $pembeli->user->name }}</td>
							<td>{{ $pembeli->tgl_masuk }} </td>
							<td>Rp. {{number_format($pembeli->total) }}</td>
							<td>
								<button type="button"  class="badge badge-outline-primary" data-toggle="modal" data-target="#Pembelian{{ $key }}">
									<i class="ti-eye"></i>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
					</table>
				</div>
{{-- 
				<div class="row justify-content-end mt-5">
					{{ $pembelis->links() }}
				</div> --}}

				@foreach ($pembelis as $key => $pembeli)
				<!-- Modal -->
				<div class="modal fade" id="Pembelian{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="PembelianLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="PembelianLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
							<div class="table-responsive" >
								<table class="table" >
								<thead>
									<tr>
									<th>Kode Masuk</th>
									<th>Nama Barang</th>
									<th>Harga</th>
									<th>Qty</th>
									<th>Sub Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($pembeli->DetailPembelian as $p)		
									<tr>
										<td>{{ $p->pembeli->kode_masuk }}</td>
										<td>{{ $p->barang->nama_barang }}</td>
										<td>{{ $p->harga_beli }}</td>
										<td>{{ $p->jumlah }}</td>
										<td>{{ $p->sub_total }}</td>
									</tr>
									@endforeach
								</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
				</div>	
				@endforeach
			
	  </div>
	</div>
  </div>
</div>
	@include('dashboard.produk.create')
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
	</script>	
	@endpush