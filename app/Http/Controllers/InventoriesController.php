<?php

namespace App\Http\Controllers;

use App\Models\inventories;
use App\Http\Requests\StoreinventoriesRequest;
use App\Http\Requests\UpdateinventoriesRequest;
use App\Http\Resources\InventoriesResource;
use App\Models\inventoriesModel;
use App\Modules\inventories\Interfaces\InventoriesServiceInterface;

class InventoriesController extends Controller
{
    protected
    $InventoriesService;

    public function __construct(
        InventoriesServiceInterface $InventoriesService
        )
    {
        $this->InventoriesService = $InventoriesService;
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

            $this->InventoriesService->createInventories($request);

         } catch (\Throwable $e) {

         
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function show(inventoriesModel $inventories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function edit(inventoriesModel $inventories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinventoriesRequest  $request
     * @param  \App\Models\inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinventoriesRequest $request, inventoriesModel $inventories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventoriesModel $inventories)
    {
        //
    }
}
