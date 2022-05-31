<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    

    public static function get_code()
    {
        $no_urut = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_barang`,8,5)),0) + 1 AS no_urut")->orderBy('no_urut')->first()->no_urut;
        $kode_barang = "B" . date("Ym") . sprintf("%'.02d", $no_urut);
        return $kode_barang;
    }
}
