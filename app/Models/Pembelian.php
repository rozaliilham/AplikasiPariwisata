<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $with = ['produk','user','CheckOutProduct'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function CheckOutProduct()
    {
        return $this->belongsTo(CheckOutProduct::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

}
