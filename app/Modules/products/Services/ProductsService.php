<?php
namespace App\Modules\products\Services;

use App\Modules\merchants\Interfaces\MerchantsRepositoryInterface;
use App\Modules\products\Interfaces\ProductsRepositoryInterface;
use App\Modules\products\Interfaces\ProductsServiceInterface;
use App\Modules\variants\Interfaces\VariantsRepositoryInterface;
use Exception;

class ProductsService implements ProductsServiceInterface
{
    protected 
    $ProductsRepository,
    $VariantsRepository;

    public function __construct(
        ProductsRepositoryInterface $ProductsRepository,
        VariantsRepositoryInterface $VariantsRepository,
        MerchantsRepositoryInterface $MerchantsRepositoy
    )
    {
        $this->ProductsRepository = $ProductsRepository;
        $this->VariantsRepository = $VariantsRepository;
        $this->MerchantsRepository = $MerchantsRepositoy;
    }

    public function getAll(){
        
        try{
            
            return $this->ProductsRepository->getAllProducts();

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }

    public function createProducts($request,$key)
    {
        try {
            $merchants = $this->MerchantsRepository->getBykey($key);

            return  $this->ProductsRepository->create(
                $request->name,
                $request->description,
                $request->price,
                $merchants->id
            );

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }

    public function update($request, $products){

        try {
             
            if(!$this->ProductsRepository->findById($products->id)){
                throw new \Exception("Product Tidak Ditemukan", 404);
            }
            $data = [
               'name'   => $request->name,
               'description' => $request->description,
               'price'  => $request->price,

            ];
            return  $this->ProductsRepository->update($data,$products->id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }
    }

    public function delete($product){
        try {
             
            if(!$this->ProductsRepository->findById($product->id)){
                throw new \Exception("Product Tidak Ditemukan", 404);
            }

            return  $this->ProductsRepository->delete($product->id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }
    }

    public function addVariant($request){

        try {

            $id_product = $request->id_product;
            $id_variant = $request->id_variant;

            if(!$this->ProductsRepository->findById($id_product)){
                throw new \Exception("Product Tidak Ditemukan", 404);
            }
            if(!$this->VariantsRepository->findById($id_variant)){
                throw new \Exception("Variant Tidak Ditemukan", 404);
            }
            if($this->ProductsRepository->GetProductVariant($id_product,$id_variant)){
                throw new \Exception("Product Sudah Memiliki Variant Tersebut", 404);
            }

            return  $this->ProductsRepository->createProductVariant($id_product,$id_variant);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }
    }
}
