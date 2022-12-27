<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'id_merchant'
    ];
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at'
    ];


    public function variants()
    {
        return $this->belongsToMany(variants::class,'product_variant', 'id_product', 'id_variant');
    }

    public function productVariant()
    {
        return $this->hasMany(productsVariants::class, 'id','id_product');
    }
}
