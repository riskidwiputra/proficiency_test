<?php
namespace App\Modules\variants\Services;

use App\Modules\variants\Interfaces\VariantsRepositoryInterface;
use App\Modules\variants\Interfaces\VariantsServiceInterface;
use \Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class VariantsService implements VariantsServiceInterface
{
    protected 
    $VariantsRepository;

    public function __construct(
        VariantsRepositoryInterface $VariantsRepository
    )
    {
        $this->VariantsRepository = $VariantsRepository;
    }

    public function getAll(){
        
        try{
            
            return $this->VariantsRepository->getAllVariants();

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }

    public function getById($id){

        try{
            
            $data = $this->VariantsRepository->findById($id);

            if(!$data){
                throw new \Exception("Variant Tidak Ditemukan", 404);
            }

            return $data;

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }

    }

    public function createVariants($request)
    {
        try {
            
            return  $this->VariantsRepository->create(
                $request->name,
                $request->additional_price,
            );

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }

    public function update($request, $variant){

        try {
             
            if(!$this->VariantsRepository->findById($variant->id)){
                throw new \Exception("Product Tidak Ditemukan", 404);
            }
            $data = [
               'name'               => $request->name,
               'additional_price'   => $request->additional_price,
            ];
            return  $this->VariantsRepository->update($data,$variant->id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(),  409);
        }
    }

    public function delete($variants){
        try {
             
            if(!$this->VariantsRepository->findById($variants->id)){
                throw new \Exception("Product Tidak Ditemukan", 404);
            }

            return  $this->VariantsRepository->delete($variants->id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }
    }
}
