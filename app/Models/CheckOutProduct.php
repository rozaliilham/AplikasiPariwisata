<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckOutProduct extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $guarded = ['id'];

    public function Produk() : BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}
