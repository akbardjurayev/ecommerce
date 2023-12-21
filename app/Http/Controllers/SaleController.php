<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sale;
use App\Models\Partition;
use Illuminate\Http\Request;
use App\Http\Requests\SaleCreateRequest;
use App\Http\Resources\SaleCreateResource;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale = Sale::all();

        return $sale;
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
    public function store(SaleCreateRequest $request)
    {
        $params = $request->validated();
        dd($params);
        // dd($requests->order);
        // foreach($requests->all() as $request){
        //     // dd($request['user_id']);
        // $old_products = Partition::where('product_id', $request['product_id'])->get();

        // $request_amount = $request['amount'];
        // if ($request['partition_id'] == null){
        // foreach($old_products as $product){

        //     if ($product->amount > $request_amount){
        //         $product_sale = Partition::where('id', $product->id)
        //         ->update([
        //             'amount'=>$product->amount - $request_amount
        //         ]);
        //         break;
        //     }elseif($product->amount < $request_amount){
        //         $sale_product = $product->amount;
        //         $request_amount = $request_amount - $sale_product;
        //         $product->amount=0;
        //         $product->save();
        //     }

        //     }
        // }else{
        //     $product_partition = Partition::where('product_id',$request['product_id'])
        //     ->where('id',$request['partition_id'])->first();
        //     if($product_partition->amount > $request['amount']){
        //         $sale_product = $product_partition->amount - $request['amount'];
        //         $product_partition->amount = $sale_product;
        //         $product_partition->save();

        //     }elseif ($product_partition->amount < $request['amount']){
        //         return response()->json([
        //             'message' => 'Have no tenough product in base'
        //         ]);
        //     }
        // }
        // }
        foreach($requests->all() as $request){

            $user = User::where('id',$request['user_id'])->first();
            $var = $user->cashback - $request['cashback'];
            dd($user);


        $partition = Partition::where('id', $request['partition_id'])->first();

        $new_partition_amount = $partition->amount - $request['amount'];
        $user->amount = $new_partition_amount;
        $user->save();

        // dd(gettype($partition_amount));

        $sale = Sale::create([

            'payment_type'=>$request['payment_type'],
            'partition_id'=>$request['partition_id'] ?? null,
            'amount'=>$request['amount'],
            'user_id'=>$request['user_id'],
            'cashback'=>$request['cashback'],
            'delivery'=>$request['delivery'],
        ]);

        return new SaleCreateResource($sale);
    }
}


    public function show(Sale $sale)
    {
        //
    }


    public function edit(Sale $sale)
    {
        //
    }


    public function update(Request $request, Sale $sale)
    {
        //
    }


    public function destroy(Sale $sale)
    {

    }
}
