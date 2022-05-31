<div class="modal fade" id="Barang" tabindex="-1" role="dialog" aria-labelledby="BarangLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
	  <div class="modal-content ">
		<div class="modal-header">
		  <h5 class="modal-title" id="BarangLabel">Create Produk</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			  <form action="/dashboard/barang" method="POST">
				@csrf
				<div class="form-group col-lg-12">
					<label for="nama Barang">nama Barang</label>
					<input type="text" name="nama_barang" class="form-control" id="nama Barang" placeholder="nama Barang">
			  </div>
				<div class="form-group col-lg-12">
					<label for="Harga jual">Harga jual</label>
					<input type="text" name="harga_jual" class="form-control" id="Harga jual" placeholder="Harga jual">
		  	</div>
				<div class="form-group col-lg-12">
					<label for="stok">Stok</label>
					<input type="text" name="stok" class="form-control" id="stok" placeholder="stok">
			  	</div>
				<div class="form-group col-lg-6">
					<label for="Produk">Produk</label>
					<select class="form-control js-example-basic-single w-100" id="Produk" name="produk_id">
						@foreach ($produks as $produk)
						<option value="{{ $produk->id }}">{{ strtoupper($produk->nama_produk) }}</option>
						@endforeach
					</select>
				</div>
			  <div class="form-group col-lg-6">
				<label for="satuan">Satuan</label>
				<select class="form-control" id="satuan" name="satuan">
				  <option>Pcs</option>
				  <option>Box</option>
				  <option>Package</option>
				  <option>Bal</option>
				  <option>Bungkus</option>
				</select> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>