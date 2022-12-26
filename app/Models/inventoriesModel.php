<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class inventoriesModel extends Model
{
    use SoftDeletes;
    
    protected $table = 'inventories';

    protected $fillable = [
        'name',
        'price',
        'amount',
        'unit'
    ];
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at'
    ];
}
