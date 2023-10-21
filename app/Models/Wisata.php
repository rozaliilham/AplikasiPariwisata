<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wisata extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $with = ['user','category','kabupaten','kecamatan'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan() : BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function komentarwisata()
    {
        return $this->hasMany(KomentarWisata::class);
    }

    public function setExpiredAttribute($value)
    {
        $this->attributes['expired'] = date("Y-m-t",strtotime($value));
    }

}
