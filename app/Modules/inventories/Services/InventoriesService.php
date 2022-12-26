<?php
namespace App\Modules\inventories\Services;

use App\Modules\inventories\Interfaces\InventoriesRepositoryInterface;
use App\Modules\inventories\Interfaces\InventoriesServiceInterface;
use Exception;

class InventoriesService implements InventoriesServiceInterface
{
    protected 
    $InventoriesRepository;

    public function __construct(
        InventoriesRepositoryInterface $InventoriesRepository
    )
    {
        $this->InventoriesRepository = $InventoriesRepository;
    }

    public function getAll(){
        
        try{
            
            return $this->InventoriesRepository->getAllInventories();

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }

    public function createInventories($request)
    {
        try {
            return  $this->InventoriesRepository->create(
                $request->name,
                $request->price,
                $request->amount,
                $request->unit
            );

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }
}
