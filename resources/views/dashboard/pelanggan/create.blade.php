<div class="modal fade" id="pelanggan" tabindex="-1" role="dialog" aria-labelledby="pelangganLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
	  <div class="modal-content ">
		<div class="modal-header">
		  <h5 class="modal-title" id="pelangganLabel">Tambah Pelanggan</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			  <form action="/dashboard/pelanggan" method="POST">
				@csrf
				<div class="form-group col-lg-12">
					<label for="nama ">Nama </label>
					<input type="text" name="nama" class="form-control" id="nama " placeholder="nama " value="{{ old('nama') }}">
			  </div>
				<div class="form-group col-lg-12">
					<label for="alamat">Alamat</label>
					<textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat">{{ old('alamat') }}</textarea>
		  	</div>
				<div class="form-group col-lg-12">
					<label for="no hp">No Hp</label>
					<input type="number" name="no_hp" class="form-control" id="no hp" placeholder="no hp" value="{{ old('no_hp') }}">
			  	</div>
				<div class="form-group col-lg-12">
					<label for="Email">Email</label>
					<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="Email" placeholder="email">
			  	</div>
				  @error('email')
				   	<div class="invalid-feedback">
						   {{ $message }}
					   </div>
				  @enderror
				
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>