@extends('dashboard.layouts.main')

@section('content')
<form action="/dashboard/pembelian" id="formTransaksi" method="POST">
	@csrf
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Transaksi Pembelian</h4>

			@if($errors->any())
			<div class="alert alert-danger" role="alert" id="error-alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			@if(session()->has('succes'))
			<div class="alert alert-success" id="succes-alert" role="alert">
				{{session('succes')  }}
			</div>
			@endif
			<div class="row">
				<div class="col-lg-12">
					<div class="mb-3 row">
						<label for="nama" class="col-lg-2 col-form-label">Tanggal Transaksi  </label>
						<div class="col-lg-4">
							<input type="date" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror"  id="tgl"  value="{{ old('tgl_masuk') }}">
						</div>
						<label for="nama" class="col-lg-2  col-form-label"></label>
						<div class="col-lg-4"> 
							<select class="form-control" id="Produk" name="pemasok_id">
								<option selected>NAMA PEMASOK</option>
								@foreach ($pemasoks as $pemasok)
								<option value="{{ $pemasok->id }}">{{ strtoupper($pemasok->nama_pemasok) }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-12">
						<div class="input-group col-lg-3">
							<input type="text" class="form-control-plaintext  form-control-lg mb-3" placeholder="Data Barang" disabled>
							<button type="button" class="badge badge-outline-primary mb-3 col-xs" data-toggle="modal" data-target="#Barang">
								Pilih Data    
							</button>		
						</div>
						<div class="table-responsive">
							<table class="table " id="tbl-transaksi">
							  <thead>
									<tr>
									  <th>Kode Barang</th>
									  <th>Nama Barang</th>
									  <th>Harga</th>
									  <th>Qty</th>
									  <th>Total</th>
									  <th>Status</th>
									</tr>
							  </thead>
							  <tbody>
									{{-- @foreach ($produks as $produk) --}}
								<tr>
									<td colspan="6" class="text-center"><i>Belum Ada Barang</i></td>
								</tr>
									{{-- @endforeach --}}
							  </tbody>
							</table>
						</div>
				</div>
				@include('dashboard.transaksi.pembelian.barang')	
			</div>
			<div class="row mt-5 ">
				<div class="col-lg-8 p-1">
					<div class="card">
						<div class="card-body bg-info" >
							<input type="text"  id="total-harga" name="total" style="color: white" class="form-control-plaintext  form-control-lg text-center" value="Rp. 0" readonly>
							{{-- <h4 class="text-center display-4" style="color: white" id="total-harga" name="total" >Rp . 0</h4> --}}
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
		<div class="row justify-content-end">
			<button type="submit" class="btn btn-primary">Simpan Transaksi</button>
		</div>
</form>
@endsection

@push('script')
	<script>
		let totalHarga = 0;
		function TambahBarang(a){
			let d = $(a).closest('tr');
			let kodeBarang = d.find('td:eq(0)').text();
			let namaBarang = d.find('td:eq(1)').text();
			let hargaBarang = d.find('td:eq(2)').text();
			let idBarang = d.find('.idBarang').val();
			let data = '';
			let tbody = $('#tbl-transaksi tbody tr td').text();
			data += '<tr>';
			data += '<td>' +kodeBarang+ '</td>';
			data += '<td>' +namaBarang+ '</td>';
			data += '<td>' +hargaBarang+ '</td>';
			data += '<input type="hidden" name="barang_id[]" value=" '+idBarang+' ">';
			data += '<input type="hidden" name="harga_beli[]" value=" '+hargaBarang+' ">';
			// data += '<input type="hidden" name="sub_total[]" value=" '+hargaBarang*parseInt($('#qty_barang').val())+' ">';
			data += '<td><input type="number" value="1" min="1" class="qty" name="jumlah[]" ></td>';
			data += '<td><input type="text" readonly class="subTotal form-control-plaintext" name="sub_total[]" value=" '+hargaBarang+' "></td>';
			data += '<td><button type="button" class="hapusBarang badge bg-danger"></button></td>';
			data += '</tr>'
			if(tbody == 'Belum Ada Barang') $('#tbl-transaksi tbody tr').remove();

			$('#tbl-transaksi tbody').append(data);
			totalHarga += parseFloat(hargaBarang);
			$('#total-harga').val(totalHarga);
			$('#Barang').modal('hide')
		}

		function calcSubTotal(a){
			let qty = parseInt($(a).closest('tr').find('.qty').val());
			let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
			let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
			let subTotal = qty * hargaBarang;
			totalHarga += subTotal - subTotalAwal;
			$(a).closest('tr').find('.subTotal').val(subTotal);
			$('#total-harga').val(totalHarga);
		}

		// event
		$(function(){
			$('tbl-barang').DataTable();

			// pemilihan barang
			$('#Barang').on('click', '.pilih-barang', function(){
				TambahBarang(this);
			
			// change qty event
			$('#formTransaksi').on('change', '.qty', function(){
				calcSubTotal(this);
			})

			// remove barang
			$('#formTransaksi').on('click', '.hapusBarang', function(){
				let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
				totalHarga -= subTotalAwal;

				$currentRow = $(this).closest('tr').remove();
				$('#total-harga') .val(totalHarga);
			})
		})

				Date.prototype.toDateInputValue = (function() {
					var local = new Date(this);
					local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
					return local.toJSON().slice(0,10);
				}); 
			$('#tgl').val(new Date().toDateInputValue());
		})


</script>
@endpush