<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class variants extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'variants';
    protected $fillable = [
        'name',
        'additional_price',
    ];
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at'
    ];

    public function products()
    {
        return $this->belongsToMany(products::class, 'product_variant', 'id_variant', 'id_product');
    }
}
