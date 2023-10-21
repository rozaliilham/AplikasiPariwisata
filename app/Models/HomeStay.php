<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HomeStay extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;


    public function CheckOut(){
        return $this->hasMany(CheckOut::class);
    }

    public function Reservasi(){
        return $this->hasMany(Reservasi::class);
    }
}
