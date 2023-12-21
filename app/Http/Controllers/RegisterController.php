<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\RegisterResource;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(RegisterRequest $request)
    {
        $new_user = User::create([
            'phone'=>$request['phone'],
            'name'=>$request['name'],
            'birthday'=>$request['birthday'],
            'male'=>$request['male'],
            'cashback'=>$request['cashback'],
            'region_id'=>$request['region_id'],
            'district_id'=>$request['district_id']
        ]);

        return new RegisterResource($new_user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $register)
    {
        //
    }
}
