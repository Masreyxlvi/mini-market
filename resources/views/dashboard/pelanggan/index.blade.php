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
			<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#pelanggan">
				Tambah Pelanggan
			</button>
			<div class="table-responsive">
				<table class="table">
				<thead>
					<tr>
					<th>Kode</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>No Hp</th>
					<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pelanggans as $pelanggan)		
					<tr>
						<td>{{ $pelanggan->kode_pelanggan }}</td>
						<td>{{ $pelanggan->nama }}</td>
						<td>{{ $pelanggan->email }}</td>
						<td>{{ $pelanggan->alamat }}</td>
						<td>{{ $pelanggan->no_hp }}</td>
						<td>
							@include('dashboard.pelanggan.edit')
							<form action="/dashboard/pelanggan/{{ $pelanggan->id }}" method="POST" class="d-inline">
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
	@include('dashboard.pelanggan.create')
	@endsection