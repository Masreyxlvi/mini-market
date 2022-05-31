@extends('dashboard.layouts.main')

@section('content')
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <h4 class="card-title">Basic Table</h4>

		  @if(session()->has('succes'))
		  <div class="alert alert-success" id="succes-alert" role="alert">
			  {{session('succes')  }}
		  </div>
		  @endif
		<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#Barang">
				Tambah Barang
			</button>
			<div class="table-responsive">
				<table class="table" id="barang">
				<thead>
					<tr>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Produk</th>
					<th>stok</th>
					<th>Satuan</th>
					<th>Harga</th>
					<th>Tarik</th>
					<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($barangs as $barang)		  
					<tr>
						<td>{{ $barang->kode_barang }}</td>
						<td>{{ $barang->nama_barang }}</td>
						<td>{{ $barang->produk->nama_produk }}</td>
						<td>{{ $barang->stok }}</td>
						<td>{{ $barang->satuan }}</td>
						<td>Rp. {{ number_format($barang->harga_jual) }}</td>
						<td>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input ditarik" id="customSwitch1" {{ $cek = ($barang->ditarik == 1? "checked" : " ") }}>
								<label class="custom-control-label" for="customSwitch1"></label>
							  </div>

								{{-- <div class="form-check form-switch">
									  <label class="form-check-label" for="flexSwitchCheckDefault">&nbsp;</label>
								<input class="form-check-input ditarik" type="checkbox"  {{ $cek = ($barang->ditarik == 1? "checked" : " ") }}>
							  </div> --}}
						</td>
						<td>
							@include('dashboard.barang.edit')
							<form action="/dashboard/barang/{{ $barang->id }}" class="d-inline" method="post">
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
			  <div class="row justify-content-end mt-3">
				{{ $barangs->links() }}
			</div>
		</div>
	</div>
</div>
	@include('dashboard.barang.create')
	@endsection

	@push('script')
	<script>
		$('#barang').on('click' , '.ditarik' , function(){
			let kodeBarang = $(this).closest('tr').find('td:eq(0)').text()
			let checked = ($(this).closest('tr').find('.ditarik').is(':checked')?1:0)
			let data = {
								kode_barang:kodeBarang,
								ditarik: checked,
								_token: "{{ csrf_token() }}"
								};
			$.post('{{ route("ditarik") }}', data, function(msg){
				alert(msg)
			})
		})	
	</script>	
	@endpush