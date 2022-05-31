@extends('dashboard.layouts.main')

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="card-header">
				<h3>Profil User</h3>
			</div>
			<div class="row">
				<div class="card">
					<div class="card-body">
							<div class="col-lg-4">
								<img src="{{ asset('assets') }}/bulid/images/images.jpg" alt="" class="rounded float-left" width="230px">
							</div>
						</div>
					</div>	
					@foreach ($users as $user)
						{{-- data User --}}
						<div class="col-lg-8 mt-3">
							<div class="card  card-info">
								<div class="card-header bg-secondary">
									<h3 class="card-title" style="text-align center">Data User</h3>
								</div>
								<div class="card-body">
									<div class="mb-2 row">
										<label for="nama" class="col-sm-3 col-form-label">Nama  </label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" id="nama" value="{{ $user->name }}">
										</div>
									</div>
									<div class="mb-2 row">
										<label for="username" class="col-sm-3 col-form-label">Username  </label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" id="username" value="{{ $user->username }}">
										</div>
									</div>
									<div class="mb-2 row">
										<label for="staticEmail" class="col-sm-3 col-form-label">No HP  </label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->no_hp }}">
										</div>
									</div>
									<div class="mb-2 row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Email  </label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->email }}">
										</div>
									</div>
									<div class="mb-2 row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Status  </label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->status }}">
										</div>
									</div>
									<div class="mb-2 row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Alamat  </label>
										<div class="col-sm-9">
											<textarea type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">{{ $user->alamat }}</textarea>
										</div>
									</div>
									
								</div>
							</div>
						</div>		
			@endforeach	
			</div>
		</div>
	</div>
@endsection