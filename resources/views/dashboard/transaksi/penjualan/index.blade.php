@extends('dashboard.layouts.main')

@section('content')
<form action="/dashboard/penjualan" id="formTransaksi" method="POST">
	@csrf
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Transaksi penjualan</h4>

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
							<input type="date" name="tgl_faktur" class="form-control @error('tgl_masuk') is-invalid @enderror"  id="tgl"  value="{{ old('tgl_masuk') }}">
						</div>
						<label for="nama" class="col-lg-2  col-form-label"></label>
						<div class="col-lg-4"> 
							<select class="form-control" id="Produk" name="pelanggan_id">
								{{-- <option selected>NAMA </option> --}}
								@foreach ($pelanggans as $pelanggan)
								<option value="{{ $pelanggan->id }}">{{ strtoupper($pelanggan->nama) }}</option>
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
				@include('dashboard.transaksi.penjualan.barang')	
			</div>
			<div class="row mt-2 ">
				<div class="col-lg-7 p-1">
					<div class="card">
						<div class="card-body bg-info" >
							<input type="text"  id="total-harga" name="total_bayar" style="color: white" class="form-control-plaintext  form-control-lg text-center" value="Rp. 0" readonly>
							{{-- <h4 class="text-center display-4" style="color: white" id="total-harga" name="total" >Rp . 0</h4> --}}
						</div>
					</div>
				</div>		
				<div class="col-lg-5 row ">
					<label for="total-harga" class="col-lg-4 col-form-label">Total</label>
					<div class="col-lg-8 mb-3">
						<input type="text" name="total" class="form-control total-harga2"  id="total-harga2"  value="Rp. 0" readonly>
					</div>
					<label for="total-harga" class="col-lg-4 col-form-label">Terima</label>
					<div class="col-lg-8 mb-3">
						<input type="text" name="terima" class="form-control terima_uang"  id="terima_uang"  placeholder="Rp. 0" >
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
			data += '<input type="hidden" name="harga_jual[]" value=" '+hargaBarang+' ">';
			// data += '<input type="hidden" name="sub_total[]" value=" '+hargaBarang*parseInt($('#qty_barang').val())+' ">';
			data += '<td><input type="number" value="1" min="1" class="qty" name="jumlah[]" ></td>';
			data += '<td><input type="text" readonly class="subTotal form-control-plaintext" name="sub_total[]" value=" '+hargaBarang+' "></td>';
			data += '<td><button type="button" class="hapusBarang badge badge-outline-danger"><i class="ti-trash"></i></button></td>';
			data += '</tr>'
			if(tbody == 'Belum Ada Barang') $('#tbl-transaksi tbody tr').remove();

			$('#tbl-transaksi tbody').append(data);
			totalHarga += parseFloat(hargaBarang);
			$('#total-harga').val(totalHarga);
			$('#total-harga2').val(totalHarga);
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
			$('#total-harga2').val(totalHarga);
		}

		// function Kembali(a){
			
		// }

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

			// kembali
			$('#formTransaksi').on('change', '.kembalian', function(){
				let totalHarga = parseFloat($(a).find('.total-harga2').val());
				let terima = parseFloat($(a).find('.terima_uang').val());

				kembali = totalHarga - terima;
				$('#kembalian').val(kembali);
			})

			// remove barang
			$('#formTransaksi').on('click', '.hapusBarang', function(){
				let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
				totalHarga -= subTotalAwal;

				$currentRow = $(this).closest('tr').remove();
				$('#total-harga') .val(totalHarga);
				$('#total-harga2') .val(totalHarga);
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