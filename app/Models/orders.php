<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orders extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    protected $table = 'orders';

    protected $fillable = [
        'id_product',
        'id_sale',
    ];
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at'
    ];

    public function product(){
        return $this->HasOne(products::class , 'id', 'id_product');
    }
    public function ordersVariant(){
        return $this->hasMany(orders_variant::class, 'id','id_order');
    }

    public function variants(){
        return $this->belongsToMany(variants::class,'orders_variant', 'id_order', 'id_variant');
    }
    

}
