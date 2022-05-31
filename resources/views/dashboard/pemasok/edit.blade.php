<!-- Button trigger modal -->
<button type="button" class="badge badge-warning border-0" data-toggle="modal" data-target="#editPemasok{{ $pemasok->id }}">
	<i class="ti-pencil-alt"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="editPemasok{{ $pemasok->id }}" tabindex="-1" role="dialog" aria-labelledby="editPemasokLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editPemasokLabel">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form action="/dashboard/pemasok/{{ $pemasok->id }}" method="POST">
			  @csrf
			  @method('PUT')
			  <div class="form-group col-lg-12">
					<label for="Kode pemasok">Kode Pemasok</label>
					<input type="text" name="kode_pemasok" class="form-control" id="Kode pemasok" placeholder="Kode pemasok" value="{{ old('kode_pemasok', $pemasok->kode_pemasok) }}">
			  </div>
			  <div class="form-group col-lg-12">
				  <label for="nama ">Nama </label>
				  <input type="text" name="nama_pemasok" class="form-control" id="nama " placeholder="nama " value="{{ old('nama_pemasok' , $pemasok->nama_pemasok) }}">
			</div>
			  <div class="form-group col-lg-12">
				  <label for="alamat">Alamat</label>
				  <textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat">{{ old('alamat', $pemasok->alamat) }}</textarea>
			</div>
			  <div class="form-group col-lg-12">
				  <label for="kota">Kota</label>
				  <input type="text" name="kota" class="form-control" id="kota" placeholder="kota" value="{{ old('kota', $pemasok->kota) }}">
				</div>
			  <div class="form-group col-lg-12">
				  <label for="no hp">No Hp</label>
				  <input type="number" name="no_hp" class="form-control" id="no hp" placeholder="no hp" value="{{ old('no_hp', $pemasok->no_hp) }}">
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