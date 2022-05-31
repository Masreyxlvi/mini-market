 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content ">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Create Produk</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="card">
				<div class="card-body">
				  <form action="/dashboard/produk" method="POST">
					@csrf
					<div class="form-group">
						  <label for="produk">Produk</label>
						  <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="produk" placeholder="Produk" value="{{ old('nama_produk') }}">
					</div>
					@error('nama_produk')
					<div class="invalid-feeback">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>