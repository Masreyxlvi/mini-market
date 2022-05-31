<!-- Button trigger modal -->
<button type="button" class="badge badge-warning border-0" data-toggle="modal" data-target="#editPelanggan{{ $pelanggan->id }}">
	<i class="ti-pencil-alt"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="editPelanggan{{ $pelanggan->id }}" tabindex="-1" role="dialog" aria-labelledby="editPelangganLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editPelangganLabel">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form action="/dashboard/pelanggan/{{ $pelanggan->id }}" method="POST">
			  @csrf
			  @method('PUT')
			  <div class="form-group col-lg-12">
					<label for="Kode pelanggan">Kode Pelanggan</label>
					<input type="text" name="kode_pelanggan" class="form-control" id="Kode pelanggan" placeholder="Kode pelanggan" value="{{ old('kode_pelanggan', $pelanggan->kode_pelanggan) }}">
			  </div>
			  <div class="form-group col-lg-12">
				  <label for="nama ">Nama </label>
				  <input type="text" name="nama" class="form-control" id="nama " placeholder="nama " value="{{ old('nama' , $pelanggan->nama) }}">
			</div>
			  <div class="form-group col-lg-12">
				  <label for="alamat">Alamat</label>
				  <textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat">{{ old('alamat', $pelanggan->alamat) }}</textarea>
			</div>
			<div class="form-group col-lg-12">
				<label for="no hp">No Hp</label>
				<input type="number" name="no_hp" class="form-control" id="no hp" placeholder="no hp" value="{{ old('no_hp', $pelanggan->no_hp) }}">
			</div>
			<div class="form-group col-lg-12">
				<label for="email">email</label>
				<input type="eamil" name="email" class="form-control" id="email" placeholder="email" value="{{ old('email', $pelanggan->email) }}">
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