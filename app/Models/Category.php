<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'categories';

    public function lab()
    {
        return $this->hasMany(Lab::class, 'category_id', 'id');
    }

    public function analisis()
    {
        return $this->hasMany(Analisis::class, 'category_id');
    }

    public function alat()
    {
        return $this->hasMany(Alat_Tambahan::class, 'category_id', 'id');
    }
}
