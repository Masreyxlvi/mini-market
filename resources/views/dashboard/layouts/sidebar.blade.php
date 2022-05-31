<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
	  <li class="nav-item  {{ Request ::is('dashboard') ? 'active' : ' ' }}">
		<a  href="/dashboard" class="nav-link">
		  <i class="icon-grid menu-icon"></i>
		  <span class="menu-title">Dashboard</span>
		</a>
	  </li>
	  <li></li>
	  <li class="nav-item {{ Request ::is('dashboard/barang', 'dashboard/produk', 'dashboard/pelanggan', 'dashboard/pemasok') ? 'active' : ' ' }}">
		<a class="nav-link active" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
		  <i class="ti-package menu-icon"></i>
		  <span class="menu-title">Master Data</span>
		  <i class="menu-arrow"></i>
		</a>
		<div class="collapse" id="ui-basic">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item "> <a class="nav-link" href="/dashboard/barang">Barang</a></li>
			<li class="nav-item "> <a class="nav-link" href="/dashboard/produk">Produk</a></li>
			<li class="nav-item "> <a class="nav-link" href="/dashboard/pelanggan">Pelanggan</a></li>
			<li class="nav-item "> <a class="nav-link" href="/dashboard/pemasok">Pemasok</a></li>
		  </ul>
		</div>
	  </li>
	  <li class="nav-item   {{ Request ::is('dashboard/pembelian','dashboard/penjualan') ? 'active' : ' ' }}">
		<a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
		  <i class="ti-money menu-icon"></i>
		  <span class="menu-title">Transaksi</span>
		  <i class="menu-arrow"></i>
		</a>
		<div class="collapse" id="form-elements">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"><a class="nav-link" href="/dashboard/pembelian">Pembelian</a></li>
			<li class="nav-item"><a class="nav-link" href="/dashboard/penjualan">Penjualan</a></li>
		  </ul>
		</div>
	  </li>
	  <li class="nav-item   {{ Request ::is('dashboard/laporan') ? 'active' : ' ' }}">
		<a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
		  <i class="ti-clipboard menu-icon"></i>
		  <span class="menu-title">Laporan</span>
		  <i class="menu-arrow"></i>
		</a>
		<div class="collapse" id="charts">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"> <a class="nav-link" href="/dashboard/laporan">Pembelian</a></li>
			<li class="nav-item"> <a class="nav-link" href="/dashboard/laporan">Penjualan</a></li>
		  </ul>
		</div>
	  </li>
	  <li class="nav-item  {{ Request ::is('dashboard/pengajuan') ? 'active' : ' ' }}">
		<a  href="/dashboard/pengajuan" class="nav-link">
		  <i class="icon-grid menu-icon"></i>
		  <span class="menu-title">Pengajuan</span>
		</a>
	  </li>
	</ul>
  </nav>