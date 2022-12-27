<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orders_variant extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $table = 'orders_variant';

    protected $fillable = [
        'id_order',
        'id_variant',
    ];
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at'
    ];
}
