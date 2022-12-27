<?php

namespace App\Http\Controllers;

use App\Models\inventories;
use App\Http\Requests\StoreinventoriesRequest;
use App\Http\Requests\UpdateinventoriesRequest;
use App\Modules\inventories\Interfaces\InventoriesServiceInterface;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    protected
    $InventoriesService,
    $key;

    public function __construct(
        InventoriesServiceInterface $InventoriesService,
        Request $request
        )
    {
        $this->InventoriesService = $InventoriesService;
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

            $getData = $this->InventoriesService->getAll();

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
     * @param  \App\Http\Requests\StoreinventoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreinventoriesRequest $request)
    {
        try{
            $this->InventoriesService->createInventories($request, $this->key);

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
     * @param  \App\Models\inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function show(inventories $inventories)
    {
        try{

            $getData = $this->InventoriesService->getById($inventories->id);

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
     * @param  \App\Http\Requests\UpdateinventoriesRequest  $request
     * @param  \App\Models\inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinventoriesRequest $request, inventories $inventories)
    {
        try{

            $this->InventoriesService->update($request, $inventories);

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
     * @param  \App\Models\inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventories $inventories)
    {
        try{

            $this->InventoriesService->delete($inventories);

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
