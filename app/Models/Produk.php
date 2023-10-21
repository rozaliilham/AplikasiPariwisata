<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function CheckOutProduct()
    {
        return $this->hasMany(CheckOutProduct::class);
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function NomorRekening()
    {
        return $this->belongsTo(NomorRekening::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
