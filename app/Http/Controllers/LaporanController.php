<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Models\Pembeli;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function pembelian()
    {
        return view('dashboard.laporan.pembelian.index', [
            'pembelis' => Pembeli::all(),
            'pemasoks' => Pemasok::all(),
            'users' => User::where('id' , auth()->user()->id)->get()           
        ]);
    }
}
