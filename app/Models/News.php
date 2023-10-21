<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $with = ['user', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query,array $filters)
    {
        $query->when($filters['category'] ?? false,function($query,$category){
            return $query->whereHas('category',function($query) use ($category) {
                $query->where('id',$category);
            });
        });
    }

    public function KomentarBerita()
    {
        return $this->hasMany(KomentarBerita::class);
    }
}
