@extends('dashboard.layouts.main')

@section('content')
<div class="row">
	<div class="col-lg-10 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <h4 class="card-title">Basic Table</h4>

		  @if(session()->has('succes'))
		  <div class="alert alert-success" id="succes-alert" role="alert">
			  {{session('succes')  }}
		  </div>
		  @endif
		<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#pemasok">
				Tambah Pemasok
			</button>
			<div class="table-responsive">
				<table class="table">
				<thead>
					<tr>
					<th>Kode Pelanggan</th>
					<th>Nama</th>
					<th>Kota</th>
					<th>Alamat</th>
					<th>No Hp</th>
					<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pemasoks as $pemasok)		
					<tr>
						<td>{{ $pemasok->kode_pemasok }}</td>
						<td>{{ $pemasok->nama_pemasok }}</td>
						<td>{{ $pemasok->kota }}</td>
						<td>{{ $pemasok->alamat }}</td>
						<td>{{ $pemasok->no_hp }}</td>
						<td>
							@include('dashboard.pemasok.edit')
							<form action="/dashboard/pemasok/{{ $pemasok->id }}" class="d-inline" method="post">
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
		</div>
	</div>
</div>
	@include('dashboard.pemasok.create')
	@endsection