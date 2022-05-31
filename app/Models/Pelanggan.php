<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public static function get_code()
    {
        $no_urut = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_pelanggan`,8,5)),0) + 1 AS no_urut")->orderBy('no_urut')->first()->no_urut;
        $kode_pelanggan = "P" . date("Ym") . sprintf("%'.02d", $no_urut);
        return $kode_pelanggan;
    }
}
