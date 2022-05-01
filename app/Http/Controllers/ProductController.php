<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{   
    public function index(){

        $products = Product::orderBy('name')->get(['name', 'author', 'quantity', 'sku']);
        return response()->json($products);
    }

    public function store(Request $request){
        try{
            $product = new Product;

            $product->name = $request->name;
            $product->author = $request->author;
            $product->publisher = $request->publisher;
            $product->year = $request->year;
            $product->description = $request->description;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->quantity = $request->quantity;

            $product->save();

            return response()->json(['message' => 'Successfully registered']);
        } catch (Exception $e) {

            return response()->json(['message' => 'Register error']);
        } 
    }

    public function show(Product $id){
        $product = Product::find($id);

        return response()->json($product);
    }

    public function update(Request $request, $id){
        {
            try{
                $product = Product::find($id)->update([
                    'name' => $request->name,
                    'author' => $request->author,
                    'publisher' => $request->publisher,
                    'year' => $request->year,
                    'description' => $request->description,
                    'sku' => $request->sku,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                ]);
    
                return response()->json(['message' => 'Successfully update']);
            } catch (Exception $e){
    
                return response()->json(['message' => 'Update error']);
            }     
        }
    }

    public function destroy($id){
        try {
            $product = Product::find($id)->delete();

            return response()->json(['message' => 'Successfully deleted']);
        } catch (Exception $e){

            return response()->json(['message' => 'Delete error']);
        }  
    }

    public function restore($id)
    {
        try {
            $product = Product::withTrashed()->find($id)->restore();

            return response()->json(['message' => 'Successfully restored']);
        } catch (Exception $e){

            return response()->json(['message' => 'Restore error']);
        }  
    }

    public function forceDelete($id){
        try {
            $product = Product::withTrashed()->find($id)->forceDelete();

            return response()->json(['message' => 'Successfully deleted']);
        } catch (Exception $e){

            return response()->json(['message' => 'Delete error']);
        }  
    }    
}