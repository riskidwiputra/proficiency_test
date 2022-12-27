<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sales extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sales';
	protected $primaryKey   = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'total_price',
        'payment_method',
        'id_merchant',
        'created_at',
    ];
    protected $hidden = [
        'deleted_at',
        'updated_at'
    ];

    public function orders()
    {
        return $this->hasMany(orders::class, 'id_sale','id');
    }

    public function card()
    {
        return $this->belongsToMany(products::class, 'orders', 'id_sale','id_product');
    }
    
}
