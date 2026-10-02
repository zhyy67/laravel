<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Transaksi extends Model
{
    protected $fillable = [
    'barang_id', 
    'jumlah', 
    'total_harga'];
    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
