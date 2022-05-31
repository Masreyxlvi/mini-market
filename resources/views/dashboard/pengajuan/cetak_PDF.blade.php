<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
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
			{{-- <th>Terpenuhi</th>
			<th>Status</th> --}}
			</tr>
		</thead>
		<tbody>
			@foreach ($pengajuan as $p)		  
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $p->pelanggan->nama }}</td>
				<td>{{ $p->nama_barang }}</td>
				<td>{{ date('d/m/Y', strtotime($p->tgl_p)) }}</td>
				<td>{{ $p->qty }}</td>
				{{-- <td>Rp. {{ number_format($pengajuan->harga_jual) }}</td> --}}
				<td>
					{{-- <div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input ditarik" id="customSwitch1" {{ $cek = ($pengajuan->status == 1? "checked" : " ") }}>
						<label class="custom-control-label" for="customSwitch1"></label>
					  </div> --}}

						{{-- <div class="form-check form-switch">
							  <label class="form-check-label" for="flexSwitchCheckDefault">&nbsp;</label>
						<input class="form-check-input ditarik" type="checkbox"  {{ $cek = ($barang->ditarik == 1? "checked" : " ") }}>
					  </div> --}}
				</td>
				{{-- <td>
					@include('dashboard.pengajuan.edit')
					<form action="/dashboard/pengajuan/{{ $pengajuan->id }}" class="d-inline" method="post">
						@csrf
						@method('DELETE')
						<button type="submit" class="badge badge-danger border-0" onclick="return confirm('Yakin Ingin Dihapus')"><i class="ti-trash"></i></button>
					</form>
				</td> --}}
			</tr>
			@endforeach
		</tbody>
		</table>
	  </div>
</body>
</html>