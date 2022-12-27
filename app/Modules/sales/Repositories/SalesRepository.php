<?php

namespace App\Modules\sales\Repositories;


use App\Models\sales;
use App\Modules\sales\Interfaces\SalesRepositoryInterface;

class SalesRepository implements SalesRepositoryInterface
{
    protected $sales;

    public function __construct(sales $Sales)
    {
        $this->sales = $Sales;
    }

    public function create(
        $id,
        $total_price,
        $payment_method,
        $id_merchant 
    )
    {
        return $this->sales->create([
            'id'                  => $id,  
            'total_price'         => $total_price,
            'payment_method'      => $payment_method,
            'id_merchant'        => $id_merchant 
        ]);
    }
    public function getSales($id){
        return $this->sales->find($id);
    }


    public function createOrder($id_sale,$id_product){
        return $this->sales->orders()->create([
                'id_product'    => $id_product,
                'id_sale'       => $id_sale
        ]);
    }
    public function update($id,$data){
        return $this->sales->where('id',$id)->update($data);
    }

    public function getAllSales($id){
        return $this->sales->where('id',$id)->with('orders',function($query){
            $query->with('product');
            $query->with('variants');
        })->get();
    }
    
}
