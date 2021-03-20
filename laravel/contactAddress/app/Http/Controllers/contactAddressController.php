<?php

namespace App\Http\Controllers;

use App\Models\contactAddress;
use Illuminate\Http\Request;

class contactAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = contactAddress::all();
        return response()->json([
            'message'=> 'OK',
            'data' => $items
        ],200);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new contactAddress;
        $item -> name = $request -> name;
        $item -> email = $request -> email;
        $item -> save();
        return response() -> json([
            'message' => 'Created successfully',
            'data' => $item
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contactAddress  $contactAddress
     * @return \Illuminate\Http\Response
     */
    public function show(contactAddress $contactAddress)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contactAddress  $contactAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactAddress $contactAddress)
    {
        $item = contactAddress::where('id',$contactAddress -> id) -> first();
        $item -> name = $request -> name;
        $item -> email = $request -> email;
        $item -> save();
        if ($item){
            return response() -> json([
                'message' => $item,
            ],200);
        }else{
            return response() -> json ([
                'message' => 'Not found',
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactAddress  $contactAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactAddress $contactAddress)
    {
        $item = contactAddress::where ('id',$contactAddress -> id)->deleted();
        if($item){
            return response() -> json([
                'message' => $item,
            ],200);
        }else{
            return response() -> json([
                'message' => $item,
            ],404);
        }
    }
}
