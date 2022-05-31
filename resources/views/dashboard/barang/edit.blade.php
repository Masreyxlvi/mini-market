<!-- Button trigger modal -->
<button type="button" class="badge badge-warning border-0" data-toggle="modal" data-target="#editBarang{{ $barang->id }}">
	<i class="ti-pencil-alt"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="editBarang{{ $barang->id }}" tabindex="-1" role="dialog" aria-labelledby="editBarangLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editBarangLabel">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form action="/dashboard/barang/{{ $barang->id }}" method="POST">
			  @csrf
			  @method('PUT')
			  <div class="form-group col-lg-12">
					<label for="Kode Barang">Kode Barang</label>
					<input type="text" name="kode_barang" readonly class="form-control" id="Kode Barang" placeholder="Kode Barang" value="{{ old('kode_barang' , $barang->kode_barang) }}">
			  </div>
			  <div class="form-group col-lg-12">
				  <label for="nama Barang">nama Barang</label>
				  <input type="text" name="nama_barang" class="form-control" id="nama Barang" placeholder="nama Barang" value="{{ old('nama_barang' , $barang->nama_barang) }}">
				</div>
			  <div class="form-group col-lg-12">
				  <label for="Harga jual">Harga jual</label>
				  <input type="text" name="harga_jual" class="form-control" id="Harga jual" placeholder="Harga jual" value="{{ old('harga_jual' , $barang->harga_jual) }}">
				</div>
			  <div class="form-group col-lg-12">
				  <label for="stok">Stok</label>
				  <input type="text" name="stok" class="form-control" id="stok" placeholder="stok" value="{{ old('stok' , $barang->stok) }}">
				</div>
			  <div class="form-group col-lg-6">
				  <label for="Produk">Produk</label>
				  <select class="form-control" id="Produk" name="produk_id">
					  @foreach ($produks as $produk)
					  	@if(old('produk_id') == $produk->id)
						  	<option value="{{ $produk->id }}" selected>{{ $produk->nama_produk }}</option>
						  @else
						  	<option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
						  @endif
					  @endforeach
				  </select>
			  </div>
			<div class="form-group col-lg-6">
			  <label for="satuan">Satuan</label>
			  <select class="form-control" id="satuan" name="satuan" autofocus>
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
  </div>