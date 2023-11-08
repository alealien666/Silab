<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'category_id'];
    protected $table = 'labs';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_lab', 'id');
    }
}
