<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productsVariants extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_variant';

    protected $fillable = [
        'id_product',
        'id_variant'
    ];

}
