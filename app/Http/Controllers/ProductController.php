<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Resources\ProductCreateResource;
use App\Http\Resources\ProductAllResource;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();

        return ProductAllResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // ProductCreateRequest
    public function store(ProductCreateRequest $request)
    {
        $path = [];
        $image = $request->file('image');
        foreach($request['image'] as $p){
            $file_path = 'storage/' . $p['image']->store('photos', 'public');

            array_push($path, [
                'image'=>$file_path,
                'primary'=>$p['primary']??false
            ]);
        }


        $request = $request->validated();


        $product = Product::create([
            'brend'=>$request['brend'],
            'image'=>$path ?? null,
            'category_id'=>$request['category_id'],
            'measure_id'=>$request['measure_id'],
            'package_type_id'=>$request['package_type_id']
        ]);

        return new ProductCreateResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
