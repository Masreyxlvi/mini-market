<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
  
    public function DetailPembelian()
    {
        return $this->hasMany(DetailPembelian::class , 'pembelian_id');
    }
}
