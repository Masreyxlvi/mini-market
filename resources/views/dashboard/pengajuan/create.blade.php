<div class="modal fade" id="Pengajuan" tabindex="-1" role="dialog" aria-labelledby="PengajuanLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
	  <div class="modal-content ">
		<div class="modal-header">
		  <h5 class="modal-title" id="PengajuanLabel">Create Produk</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			  <form action="/dashboard/pengajuan" method="POST">
					@csrf
					<div class="form-group col-lg-12">
						<label for="nama barang">Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control" id="nama barang" placeholder="nama barang">
				</div>
				<div class="form-group col-lg-12">
					<label for="pelanggan">pelanggan</label>
					<select class="form-control js-example-basic-single w-100" id="pelanggan" name="pelanggan_id">
						@foreach ($pelanggans as $pelangan)
							<option value="{{ $pelangan->id }}">{{ strtoupper($pelangan->nama) }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-lg-6">
						<label for="tgl pengajuan">Tanggal Pengajuan</label>
						<input type="date" name="tgl_pengajuan" class="form-control" id="tgl pengajuan" placeholder="tgl pengajuan">
				</div>
					<div class="form-group col-lg-6">
						<label for="qty">Qty</label>
						<input type="number" name="qty" class="form-control" id="qty" placeholder="qty">
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>