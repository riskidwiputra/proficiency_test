<?php

namespace App\Modules\variants\Interfaces;
interface VariantsRepositoryInterface
{
    public function create(
        $name,
        $additional_price
    );
    public function getAllVariants();
    public function findById($id);
    public function update($data, $id);
    public function delete($id);
}
