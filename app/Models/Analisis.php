<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Analisis extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'analises';
    protected $guarded = [
        'id',
        'category_id',
        'id_alat'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($jenis) {
            $jenis->slug = Str::slug($jenis->jenis_pengujian);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class,  'analisis_id', 'id_order');
    }
}
