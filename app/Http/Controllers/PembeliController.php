<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\User;
use App\Models\Pemasok;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaksi.pembelian.index', [
            'barangs' => Barang::all(),
            'produks' => Produk::all(),
            'pemasoks' => Pemasok::all()     
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = Pembeli::orderBy('id', 'desc')->first();
        $urutan = ($d == null?1:substr($d->kode_masuk,5,6)+1);

        $kode_masuk = sprintf('P' .date('Y') .'%06d' ,$urutan); 
        // dd($request);
        $validateData = $request->validate([
            'tgl_masuk' => 'required',
            'total' => 'required',
            'pemasok_id' => 'required',
            'barang_id' => 'required',
            'harga_beli' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required'
        ]);

        $validateData['kode_masuk'] = $kode_masuk;
        $validateData['user_id'] = Auth::id();
        // // dd($request);
        $input_pembelian =  Pembeli::create($validateData);
        if($input_pembelian == null) return"data gagal diinput"+$validateData;
        // // dd($input_pembelian);

        // return redirect('dashboard/pembelian')->with('succes', 'Data Hass Been Created');  
        
        // input detail pembelian
        $barang_id = $request->barang_id;
        $harga_beli = $request->harga_beli;
        $jumlah = $request->jumlah;
        $sub_total = $request->sub_total;

        foreach($barang_id as $i => $v){
           $validateData['pembelian_id'] = $input_pembelian->id;
           $validateData['barang_id'] = $barang_id[$i];
           $validateData['harga_beli'] = $harga_beli[$i];
           $validateData['jumlah'] = $jumlah[$i];
           $validateData['sub_total'] = $sub_total[$i];
            
           $input_detail_pembelian =  DetailPembelian::create($validateData);
        //    dd($validateData);
         }
        return redirect('dashboard/pembelian')->with('succes','Data Hass Been Created' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function show(Pembeli $pembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembeli $pembeli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembeli $pembeli)
    {
        //
    }
}
