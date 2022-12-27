<?php

namespace App\Modules\orders\Interfaces;

interface OrdersRepositoryInterface
{
    public function createOrderVariant($id_order,$id_variant);
}
