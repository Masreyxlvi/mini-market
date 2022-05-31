@extends('dashboard.layouts.main')

@section('content')
<div class="row">
	<div class="col-lg-9 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <h4 class="card-title">Basic Table</h4>
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
			<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
				Create Produk
			</button>

		  <div class="table-responsive">
			<table class="table">
			  <thead>
				<tr>
				  <th>No</th>
				  <th>Nama Produk.</th>
				  <th>Status</th>
				</tr>
			  </thead>
			  <tbody>
				@foreach ($produks as $produk)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $produk->nama_produk }}</td>
					<td>
						<a class="badge badge-warning"><i class="ti-pencil-alt"></i></a>
						<form action="/dashboard/produk/{{ $produk->id }}" class="d-inline" method="post">
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
	@include('dashboard.produk.create')
	@endsection