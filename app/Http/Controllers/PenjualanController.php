<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\TampungBayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaksi.penjualan.index', [
            'barangs' => Barang::all(),
            'pelanggans' => Pelanggan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = Penjualan::orderBy('id', 'desc')->first();
        $urutan = ($d == null?1:substr($d->no_faktur,5,6)+1);

        $nofaktur = sprintf('R' .date('Y') .'%06d' ,$urutan); 
        // dd($nofaktur);
        $validateData = $request->validate([
            'tgl_faktur' => 'required',
            'total_bayar' => 'required',
            'pelanggan_id' => 'required',
            'barang_id' => 'required',
            'harga_jual' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required',
            'total' => 'required',
            'terima' => 'required',
        ]);

        $validateData['no_faktur'] = $nofaktur;
        $validateData['user_id'] = Auth::id();
        // // dd($request);
        $input_penjualan =  Penjualan::create($validateData);
        if($input_penjualan == null) return"data gagal diinput"+$validateData;
        // // dd($input_penjualan);

        // return redirect('dashboard/pembelian')->with('succes', 'Data Hass Been Created');  

        
        
        // input detail pembelian
        $barang_id = $request->barang_id;
        $harga_jual = $request->harga_jual;
        $jumlah = $request->jumlah;
        $sub_total = $request->sub_total;

        foreach($barang_id as $i => $v){
           $validateData['penjualan_id'] = $input_penjualan->id;
           $validateData['barang_id'] = $barang_id[$i];
           $validateData['harga_jual'] = $harga_jual[$i];
           $validateData['jumlah'] = $jumlah[$i];
           $validateData['sub_total'] = $sub_total[$i];
            
           $input_detail_pembelian =  DetailPenjualan::create($validateData);
        //    dd($validateData);
         }
        $total = $request->total;
        $terima = $request->terima;
        $kembalian = $terima-$total;

        $validateData['penjualan_id'] = $input_penjualan->id;
        $validateData['total'] = $total;
        $validateData['terima'] = $terima;
        $validateData['kembali'] = $kembalian;
        $input_tampung_bayar =  TampungBayar::create($validateData);

        return redirect('dashboard/penjualan')->with('succes','Data Hass Been Created' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
