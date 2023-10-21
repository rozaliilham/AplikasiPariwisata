<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarWisata extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $with = ['wisata'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
