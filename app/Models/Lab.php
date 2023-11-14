<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lab extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'category_id'];
    protected $fillable = ['status'];
    protected $table = 'labs';
    protected $primaryKey = 'id';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lab) {
            $lab->slug = Str::slug($lab->nama_lab);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class,  'id_lab', 'id_order');
    }
}
