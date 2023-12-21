<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use Illuminate\Http\Request;
use App\Http\Requests\MeasureCreateRequest;
use App\Http\Resources\MeasureCreateResource;
use App\Http\Resources\MeasureUpdateResource;
use App\Http\Resources\MeasureShowResource;
use App\Http\Resources\MeasureAllResource;

class MeasureController extends Controller
{
    public function index()
    {
        $all = Measure::all();

        return MeasureAllResource::collection($all);

    }

    public function store(MeasureCreateRequest $request)
    {
        $request = $request->validated();

        $measure = Measure::create([
            'name'=>$request['name'],
            'unit'=>$request['unit'],
            'is_active'=>$request['is_active'] ?? true,
        ]);

        return new MeasureCreateResource($measure);
    }


    public function show($id)
    {
        $measure = Measure::find($id);

        return new MeasureShowResource($measure);
    }


    public function update(Request $request, $id)
    {
        $measure = Measure::where('id', $id)
        ->update([
            'name'=>$request['name'],
            'unit'=>$request['unit'],
            'is_active'=>$request['is_active']
        ]);

        return new MeasureUpdateResource($measure);
    }


    public function destroy(Request $request)
    {
        $measure_delete = Measure::where('name', $request['name']);

        $measure_delete->delete();

        return response()->json([
            'message'=>$request['name'] . 'measure has been deleted'
        ]);
    }
}
