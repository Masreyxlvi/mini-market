<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pemasok.index', [
            'pemasoks' => Pemasok::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pemasok.create');
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
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_hp' => 'required',
        ]);

        $validateData['kode_pemasok'] = Pemasok::get_code($validateData);
        
        // dd($validateData);

        Pemasok::create($validateData);
        return redirect('dashboard/pemasok')->with('succes' , 'Data Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasok $pemasok)
    {
        return view('dashboard.pemasok.edit', [
            'pemasok' => $pemasok
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasok $pemasok)
    {
        $validateData = $request->validate([
            'kode_pemasok' => 'required',
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_hp' => 'required',
        ]);

        // dd($validateData);
        Pemasok::where('id', $pemasok->id)
                        ->update($validateData);

        return redirect('dashboard/pemasok')->with('succes' , 'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $pemasok)
    {
        Pemasok::destroy($pemasok->id);

        return redirect('dashboard/pemasok')->with('succes' , 'Data Has Been Delete!');
    }
}
