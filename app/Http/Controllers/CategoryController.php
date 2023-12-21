<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Resources\CategoryAllResource;
use App\Http\Resources\CategoryCreateResource;
use App\Http\Resources\CategoryShowResource;
use App\Filters\CategoryFilter;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Category::query();

        $categories = (new CategoryFilter($query, $request))
            ->apply()
            ->get();


        return CategoryAllResource::collection($categories);
    }


    public function store(CategoryCreateRequest $request)
    {
        $path = $request->file('image')->store("photos", 'public');

        $category = Category::create([
            'parent_id'=>$request->parent_id,
            'name'=>$request->name,
            'image'=>$path,
            'is_active'=>$request->is_active ?? true,
        ]);
        return new CategoryCreateResource($category);

    }

    public function show($id)
    {
        $category = Category::find($id);

        return new CategoryShowResource($category);
    }

    public function update(Request $request, $id)
    {
       if ($request->image !== null){
        $image = Category::where('id', $id)->first();
        if (Storage::exists('public/'.$image['image'])){
        }
        $path = $request->file('image')->store('photos', 'public');

       }
    $update = Category::where('id', $id)
        ->update([
            'name'=>$request['name'],
            'image'=>$path

        ]);
    return response()->json([
        'message'=>'Category successfully updated'
    ]);

    }

    public function destroy(Category $id)
    {
        $model = Category::find($id);

        if ($model === null){
            return response()->json(['message'=>'Item not found']);
        }else{
            return $model;
        }
    }
}
