<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;


class SaleController extends Controller
{
    public function store(Request $request)
    {
        try{         
            $sale = new Sale;

            $sale->client_id = $request->client_id;
            $sale->product_id = $request->product_id;
            $sale->quantity = $request->quantity;
            $sale->price = Product::find($request->product_id)->price;
            $sale->total_price = $sale->price * $sale->quantity;

            $sale->save();

            return response()->json(['message' => 'Successfully registered']);
        } catch (Exception $e) {

            return response()->json(['message' => 'Register error']);
        }
    }
}