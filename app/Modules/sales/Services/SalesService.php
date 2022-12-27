<?php
namespace App\Modules\sales\Services;

use App\Modules\merchants\Interfaces\MerchantsRepositoryInterface;
use App\Modules\orders\Interfaces\OrdersRepositoryInterface;
use App\Modules\products\Interfaces\ProductsRepositoryInterface;
use App\Modules\sales\Interfaces\SalesRepositoryInterface;
use App\Modules\sales\Interfaces\SalesServiceInterface;
use App\Modules\variants\Interfaces\VariantsRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class SalesService implements SalesServiceInterface
{
    protected 
    $salesRepository,
    $variantRepository,
    $MerchantsRepository,
    $OrderRepository,
    $ProductsRepository;

    public function __construct(
        SalesRepositoryInterface $SalesRepository,
        ProductsRepositoryInterface $ProductsRepository,
        VariantsRepositoryInterface $variantRepository,
        MerchantsRepositoryInterface $MerchantsRepositoy,
        OrdersRepositoryInterface $OrderRepository
    )
    {
        $this->salesRepository = $SalesRepository;
        $this->variantRepository = $variantRepository;
        $this->ProductsRepository = $ProductsRepository;
        $this->OrderRepository = $OrderRepository;
        $this->MerchantsRepository = $MerchantsRepositoy;
    }

    public function store($request){

        try {

            DB::beginTransaction();

            $payment_method = $request->payment_method;
            $orders = $request->orders;
            $total_price = 0; 
            $sales_id = "S-".uniqid()."-".strtotime(now());
            $merchants = $this->MerchantsRepository->getBykey($request->key);
            $sales = $this->salesRepository->create(
                $sales_id,
                $total_price,
                $payment_method,
                $merchants->id
            );
            foreach($orders as $order){
                $id_product = $order['id_product'];
                $product = $this->ProductsRepository->findById($id_product);
                $total_price += $product->price;
                $getOrder = $this->salesRepository->createOrder($sales_id,$id_product);
                foreach($order['variant'] as $id_variant){
                    $variant =  $this->variantRepository->findById($id_variant);
                    $total_price += $variant->additional_price;
                    $this->OrderRepository->createOrderVariant($getOrder->id,$id_variant);
                }
            }
            $data = [
                'total_price' => $total_price
            ];
            $updateSales = $this->salesRepository->update($sales_id,$data);

            DB::commit();

            return $updateSales;

        } catch (\Exception $e) {

            DB::rollBack();

            throw new Exception($e->getMessage(), 409);
        }
    }

    public function show($id){
        try{
            
            return $this->salesRepository->getAllSales($id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }
    
}
