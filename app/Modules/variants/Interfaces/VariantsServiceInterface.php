<?php

namespace App\Modules\variants\Interfaces;
interface VariantsServiceInterface
{
    public function getAll();
    public function createVariants($request);
    public function getById($id);
    public function update($request,$Variants);
    public function delete($id);
    
}
