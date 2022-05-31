<!-- Button trigger modal -->
<button type="button" class="badge badge-warning border-0" data-toggle="modal" data-target="#editPengajuan{{ $pengajuan->id }}">
	<i class="ti-pencil-alt"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="editPengajuan{{ $pengajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="editPengajuanLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editPengajuanLabel">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form action="/dashboard/pengajuan/{{ $pengajuan->id }}" method="POST">
				@method('PUT')
				@csrf
				<div class="form-group col-lg-12">
					<label for="nama pengajuan">Nama barang</label>
					<input type="text" name="nama_barang" class="form-control" id="nama barang" placeholder="nama barang" value="{{ old('nama_barang', $pengajuan->nama_barang) }}">
			</div>
			<div class="form-group col-lg-6">
				<label for="Barang">Barang</label>
				<select class="form-control js-example-basic-single w-100" id="Barang" name="barang_id">
					@foreach ($pelanggans as $pelanggan)
					  	@if(old('pelanggan_id') == $pelanggan->id)
						  	<option value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama_pelanggan }}</option>
						  @else
						  	<option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
						  @endif
					  @endforeach
					</select>
				</div>
				<div class="form-group col-lg-6">
					<label for="tgl pengajuan">Tanggal Pengajuan</label>
					<input type="date" name="tgl_pengajuan" class="form-control" id="tgl pengajuan" placeholder="tgl pengajuan" value="{{ old('tgl_pengajuan', $pengajuan->tgl_pengajuan) }}">
			</div>
				<div class="form-group col-lg-6">
					<label for="qty">qty</label>
					<input type="number" name="qty" class="form-control" id="tqtygl pengajuan" placeholder="qty" value="{{ old('qty', $pengajuan->qty) }}">
			</div>
		
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</form>
		</div>
	  </div>
	</div>
  </div>