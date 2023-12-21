<?php

namespace App\Http\Controllers;

use App\Models\Brend;
use Illuminate\Http\Request;
use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Http\Resources\BrandCreateResource;
use App\Http\Resources\BrandAllResource;

class BrendController extends Controller
{
    public function index()
    {
        $brand = Brend::all();
        return BrandAllResource::collection($brand);
    }

    public function create()
    {
        //
    }

    public function store(BrandCreateRequest $request)
    {
        $path = $request->file('logo')->store('logos','public');
        // dd($request);
        $brend = Brend::create([
            'name'=>$request['name'],
            'logo'=>'storage/'.$path,
            'is_active'=>$request['is_active']
        ]);

        return new BrandCreateResource($brend);
    }


    public function show(Brend $brand, $id)
    {

        $brand = Brend::where('id', $id)->first();

        return new BrandAllResource($brand);
    }

    public function edit(Brend $brend)
    {
        //
    }

    public function update(BrandUpdateRequest $request, $id)
    {

        $new_path = $request->file('image')->store('logos', 'public');


        $update = Brend::where('id', $id)
        ->update([
            'name'=>$request->name,
            'logo'=>'storage/'. $new_path,
            'is_active'=>$request->is_active,
        ]);

        return response()->json([
            'message'=>'Item has been updated'
        ]);
    }

    public function destroy(int $id)
    {
        $model = Brend::find($id);

        if ($model === null){
            return response()->json(['message'=>'Item not found']);
        }else{
            return $model;
        }

    }
}
