<?php

namespace App\Http\Controllers;

use App\Models\sales;
use App\Http\Requests\StoresalesRequest;
use App\Http\Requests\UpdatesalesRequest;
use App\Modules\sales\Interfaces\SalesServiceInterface;
use App\Transformer\SalesTransform;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class SalesController extends Controller
{

    protected
    $salesService,
    $key;

    public function __construct(
        SalesServiceInterface $SalesService,
        Request $request
        )
    {
        $this->salesService = $SalesService;
        $this->key = $request->input('key');
    }

    public function show($id)
    {
        try{

            $getData = $this->salesService->show($id);

            $manager = new Manager();

            $data = new Collection($getData, new SalesTransform);

            $data = current(current($manager->createData($data)->toArray()));

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
     * @param  \App\Http\Requests\StoresalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresalesRequest $request)
    {
        try{

            $this->salesService->store($request);

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


 
}
