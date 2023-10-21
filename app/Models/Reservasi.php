<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $with = ['homeStay','user','checkOut'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function CheckOut()
    {
        return $this->belongsTo(CheckOut::class);
    }

    public function homeStay()
    {
        return $this->belongsTo(HomeStay::class);
    }
}
