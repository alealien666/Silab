<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat_Tambahan extends Model
{
    use HasFactory;
    protected $table = 'alat_tambahans';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function order()
    {
        return $this->belongsToMany(Order::class, 'detail_orders', 'id_alat', 'id_order');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
