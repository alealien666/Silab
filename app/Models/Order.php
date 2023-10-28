<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'user_id'];
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lab()
    {
        return $this->belongsToMany(Order::class, 'detail_orders', 'id', 'id_lab');
    }

    public function analisis()
    {
        return $this->belongsToMany(Analisis::class, 'detail_order_analisis', 'id', 'id_analisis');
    }
}
