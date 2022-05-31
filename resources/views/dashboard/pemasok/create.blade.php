<div class="modal fade" id="pemasok" tabindex="-1" role="dialog" aria-labelledby="pemasokLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
	  <div class="modal-content ">
		<div class="modal-header">
		  <h5 class="modal-title" id="pemasokLabel">Tambah Pemasok</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			  <form action="/dashboard/pemasok" method="POST">
				@csrf
				<div class="form-group col-lg-12">
					<label for="nama ">Nama </label>
					<input type="text" name="nama_pemasok" class="form-control" id="nama " placeholder="nama ">
			  </div>
				<div class="form-group col-lg-12">
					<label for="alamat">Alamat</label>
					<textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat"></textarea>
		  	</div>
				<div class="form-group col-lg-12">
					<label for="kota">Kota</label>
					<input type="text" name="kota" class="form-control" id="kota" placeholder="kota">
			  	</div>
				<div class="form-group col-lg-12">
					<label for="no hp">No Hp</label>
					<input type="number" name="no_hp" class="form-control" id="no hp" placeholder="no hp">
			  	</div>
					
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>