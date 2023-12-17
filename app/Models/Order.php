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
        return $this->belongsTo(Lab::class,  'id_lab', 'id_lab');
    }
    public function analisis()
    {
        return $this->belongsTo(Analisis::class, 'analisis_id', 'id');
    }
    public function alat()
    {
        return $this->belongsToMany(Alat_Tambahan::class, 'detail_orders', 'id_order', 'id_alat');
    }
    public function hasilAnalisis()
    {
        return $this->hasOne(HasilAnalisis::class, 'order_id', 'id');
    }
}
