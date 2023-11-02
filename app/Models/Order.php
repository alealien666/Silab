<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'user_id'];
    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lab()
    {
        return $this->belongsToMany(Lab::class, 'detail_orders', 'id_order', 'id_lab');
    }
    public function alat()
    {
        return $this->belongsToMany(Alat_Tambahan::class, 'detail_orders', 'id_order', 'id_alat');
    }
}
