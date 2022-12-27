<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use App\Http\Requests\VariantProductRequest;
use App\Modules\products\Interfaces\ProductsServiceInterface;
use App\Transformer\ProductTransform;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    protected
    $productsService,
    $key;

    public function __construct(
        ProductsServiceInterface $ProductsService,
        Request $request
        )
    {
        $this->productsService = $ProductsService;
        $this->key = $request->input('key');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $getData = $this->productsService->getAll();

            $manager = new Manager();

            $data = new Collection($getData, new ProductTransform);

            $data = current($manager->createData($data)->toArray());

            return response()->json($data);

        } catch (\Throwable $e) {

            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], $e->getCode() != 0 ? $e->getCode() : 409);
        
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductsRequest $request)
    {
        try{

            $this->productsService->createProducts($request,$this->key);

            return response()->json([
                'status'    => true,
                'message'   => "Data Berhasil ditambahkan"
            ],201);

         } catch (\Throwable $e) {

            return response()->json([
                'status'  => false,
                'message' => "Data Gagal Ditambahkan",
                'error'   => $e->getMessage()
            ], $e->getCode() != 0 ? $e->getCode() : 409);
         
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductsRequest  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductsRequest $request, products $products)
    {
        try{

            $this->productsService->update($request, $products);

            return response()->json([
                'status'    => true,
                'message'   => "Data Berhasil Diubah"
            ],201);

         } catch (\Throwable $e) {

            return response()->json([
                'status'  => false,
                'message' => "Data Gagal Diubah",
                'error'   => $e->getMessage()
            ], $e->getCode() != 0 ? $e->getCode() : 409);
         
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        try{

            $this->productsService->delete($products);

            return response()->json([
                'status'    => true,
                'message'   => "Data Berhasil Dihapus"
            ],201);

         } catch (\Throwable $e) {

            return response()->json([
                'status'  => false,
                'message' => "Data Gagal Dihapus",
                'error'   => $e->getMessage()
            ], $e->getCode() != 0 ? $e->getCode() : 409);
         
        }
    }
    public function addVarints(VariantProductRequest $request){

        try{

            $this->productsService->addVariant($request);

            return response()->json([
                'status'    => true,
                'message'   => "Data Berhasil Ditambahkan"
            ],201);

         } catch (\Throwable $e) {

            return response()->json([
                'status'  => false,
                'message' => "Data Gagal Ditambahkan",
                'error'   => $e->getMessage()
            ], $e->getCode() != 0 ? $e->getCode() : 409);
         
        }
    }
}
