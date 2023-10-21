<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorRekening extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
