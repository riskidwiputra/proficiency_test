<?php

namespace App\Http\Controllers;

use App\Models\variants;
use App\Http\Requests\StorevariantsRequest;
use App\Http\Requests\UpdatevariantsRequest;
use App\Modules\variants\Interfaces\VariantsServiceInterface;

class VariantsController extends Controller
{

    protected
    $variantsService;

    public function __construct(
        VariantsServiceInterface $VariantsService
        )
    {
        $this->variantsService = $VariantsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $getData = $this->variantsService->getAll();

            return response()->json($getData, 200);

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
     * @param  \App\Http\Requests\StorevariantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevariantsRequest $request)
    {
        try{

            $this->variantsService->createVariants($request);

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
     * Display the specified resource.
     *
     * @param  \App\Models\variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function show(variants $variants)
    {
        try{

            $getData = $this->variantsService->getById($variants->id);

            return response()->json($getData, 200);

        } catch (\Throwable $e) {

            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], $e->getCode() != 0 ? $e->getCode() : 409);
        
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevariantsRequest  $request
     * @param  \App\Models\variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevariantsRequest $request, variants $variants)
    {
        try{

            $this->variantsService->update($request, $variants);

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
     * @param  \App\Models\variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function destroy(variants $variants)
    {
        try{

            $this->variantsService->delete($variants);

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
}
