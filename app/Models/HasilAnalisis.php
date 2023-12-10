<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilAnalisis extends Model
{
    use HasFactory;
    protected $table = 'hasil_analises';

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
