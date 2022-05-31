<div class="modal fade" id="Barang" tabindex="-1" role="dialog" aria-labelledby="BarangTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="BarangTitle">Modal title</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<table class="table table-hover" id="tbl-barang">
				<thead>
					<tr>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($barangs as $barang)		  
					<tr>
						<td>{{ $barang->kode_barang }}<input type="hidden" class="idBarang"  value="{{ $barang->id }}"> </td>
						<td>{{ $barang->nama_barang }}</td>
						<td>{{ $barang->harga_jual }}</td>
						<td>
							<button type="button" class="pilih-barang badge badge-outline-success ">Pilih</button>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			  </div>
		</div>
	</div>
	</div>
</div>