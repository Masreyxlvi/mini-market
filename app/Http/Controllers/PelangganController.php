<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Database\Factories\PelangganFactory;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pelanggan.index', [
            'pelanggans' => Pelanggan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pelanggan.create');
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
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|unique:pelanggans',
        ]);

        $validateData['kode_pelanggan'] = Pelanggan::get_code($validateData);
        // dd($validateData);
        Pelanggan::create($validateData);
        return redirect('dashboard/pelanggan')->with('succes', 'Data Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.edit', [
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $rules =[
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ];
        if($request->email != $pelanggan->email){
            $rules['email'] = 'required|unique:pelanggans';
        }


        $validateData = $request->validate($rules);

        Pelanggan::where('id', $pelanggan->id)
                        ->update($validateData);

        return redirect('dashboard/pelanggan')->with('succes', 'Data Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        Pelanggan::destroy($pelanggan->id);

        return redirect('dashboard/pelanggan')->with('succes', 'Data Has Been Deleted!');
    }
}
