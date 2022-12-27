<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class merchants extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'merchants';

    protected $fillable = [
        'name',
        'key',
    ];
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at'
    ];

}
