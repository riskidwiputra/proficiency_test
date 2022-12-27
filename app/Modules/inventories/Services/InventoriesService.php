<?php
namespace App\Modules\inventories\Services;

use App\Modules\inventories\Interfaces\InventoriesRepositoryInterface;
use App\Modules\inventories\Interfaces\InventoriesServiceInterface;
use App\Modules\merchants\Interfaces\MerchantsRepositoryInterface;
use Exception;

class InventoriesService implements InventoriesServiceInterface
{
    protected 
    $InventoriesRepository,
    $MerchantsRepository;

    public function __construct(
        InventoriesRepositoryInterface $InventoriesRepository,
        MerchantsRepositoryInterface $MerchantsRepository
    )
    {
        $this->InventoriesRepository = $InventoriesRepository;
        $this->MerchantsRepository = $MerchantsRepository;
    }

    public function getAll(){
        
        try{
            
            return $this->InventoriesRepository->getAllInventories();

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }

    public function getById($id){

        try{
            
            $data = $this->InventoriesRepository->findById($id);

            if(!$data){
                throw new \Exception("Inventories Tidak Ditemukan", 404);
            }

            return $data;

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }

    }

    public function createInventories($request,$key)
    {
        try {
            
            $merchants = $this->MerchantsRepository->getBykey($key);

            return  $this->InventoriesRepository->create(
                $request->name,
                $request->price,
                $request->amount,
                $request->unit,
                $merchants->id
            );

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }
        

    }

    public function update($request, $inventories){

        try {
             
            if(!$this->InventoriesRepository->findById($inventories->id)){
                throw new \Exception("Inventories Tidak Ditemukan", 404);
            }
            $data = [
               'name'   => $request->name,
               'price'  => $request->price,
               'amount' => $request->amount,
               'unit'   => $request->unit
            ];
            return  $this->InventoriesRepository->update($data,$inventories->id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }
    }

    public function delete($inventories){
        try {
             
            if(!$this->InventoriesRepository->findById($inventories->id)){
                throw new \Exception("Inventories Tidak Ditemukan", 404);
            }

            return  $this->InventoriesRepository->delete($inventories->id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }
    }
}
