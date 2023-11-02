<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_alat',
        'id_order',
        'id_lab'
    ];
}
