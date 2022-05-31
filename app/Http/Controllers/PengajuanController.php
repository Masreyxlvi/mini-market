<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Pengajuan;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use PDF;


use function PHPUnit\Framework\returnSelf;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengajuan.index' ,[
            'pengajuans' => Pengajuan::all(),
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
        $validateData = $request->validate([
            'nama_barang' => 'required',
            'pelanggan_id' => 'required',
            'tgl_pengajuan' => 'required',
            'qty' => 'required',
        ]);

        // dd($validateData);
        Pengajuan::create($validateData);

        return redirect('dashboard/pengajuan')->with('succes', 'Data Has Been Created!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        return view('dashboard.pengajuan.edit', [
            'pengajuan' => $pengajuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $validateData = $request->validate([
            'nama_barang' => 'required',
            'pelanggan_id' => 'required',
            'tgl_pengajuan' => 'required',
            'qty' => 'required',
        ]);

        // dd($validateData);
        Pengajuan::where('id' ,$pengajuan->id)
                        ->update($validateData);


        return redirect('dashboard/pengajuan')->with('succes', 'Data Has Been Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        Pengajuan::destroy($pengajuan->id);

        return redirect('dashboard/pengajuan')->with('succes', 'Data Has Been Deleted!!');
    }

    public function cetak_pdf(Pengajuan $pengajuan)
    {
        $pengajuan = Pengajuan::all();

        $pdf = PDF::loadView('dashboard.pengajuan.cetak_PDF', [
            'pengajuan' => $pengajuan
        ]);
        return $pdf->stream();
    }

    public function updateDipenuhi(Request $request){
        $data = Pengajuan::where('id', $request->id)->first();
        $data->status = $request->status;
        $update = $data->save;

        if($update)
        return 'data terpenuhi';
        return 'data belum terpenuhi';
    }
}
