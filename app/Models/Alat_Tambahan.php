<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat_Tambahan extends Model
{
    use HasFactory;
    protected $table = 'alat_tambahans';
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsToMany(Order::class, 'detail_orders', 'id', 'id_order');
    }

    public function category()
    {
        return $this->belongsTo(Lab::class, 'category_id', 'id');
    }
}
