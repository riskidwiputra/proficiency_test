<?php

namespace App\Modules\sales\Interfaces;
interface SalesRepositoryInterface
{
    public function create(
        $id,
        $total_price,
        $payment_method,
        $id_merchant 
    );
    public function getSales($id);
    public function createOrder($id_sale,$id_product);
    public function update($id,$data);
    public function getAllSales($id);
}
