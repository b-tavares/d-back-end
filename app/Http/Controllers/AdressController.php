<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adress;
use App\Models\Client;

class AdressController extends Controller
{   
    public function store(Request $request)
    {
        try{
            $adress = new Adress;

            $adress->street = $request->street;
            $adress->number = $request->number;
            $adress->district = $request->district;
            $adress->city = $request->city;
            $adress->state = $request->state;
            $adress->zipcode = $request->zipcode;
            $adress->client_id = $request->client_id;

            $adress->save();

            return response()->json(['message' => 'Successfully registered']);
        } catch (Exception $e) {

            return response()->json(['message' => 'Register error']);
        } 
    }

    public function update(Request $request, $id)
    {
        try{
            $adress = Adress::find($id)->update([
                'street' => $request->street,
                'number' => $request->number,
                'district' => $request->district,
                'city' => $request->city,
                'state' => $request->state,
                'zipcode' => $request->zipcode,
            ]);

            return response()->json(['message' => 'Successfully update']);
        } catch (Exception $e){

            return response()->json(['message' => 'Update error']);
        }     
    }
}