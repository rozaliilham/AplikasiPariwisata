<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckOut extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $guarded = ['id'];
    public function HomeStay() : BelongsTo
    {
        return $this->belongsTo(HomeStay::class);
    }

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}
