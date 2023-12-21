<?php

namespace App\Http\Controllers;

use App\Models\Partition;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\PartitionCreateRequest;
use App\Http\Resources\PartitionCreateResource;

class PartitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $all_products = Partition::where('product_id', $request['product_id'])->get();
        // dd($all_products);
        return ['data' => $all_products];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(PartitionCreateRequest $request)
    {
        $partition = Partition::create([
            'product_id'=>$request['product_id'],
            'amount'=>$request['amount'],
            'price'=>$request['price']
        ]);

        return new PartitionCreateResource($partition);
    }



    /**
     * Display the specified resource.
     */
    public function show(Partition $partition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partition $partition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partition $partition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partition $partition)
    {
        //
    }
}


