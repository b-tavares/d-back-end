<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Sale;
//use App\Models\Adress;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id')->get();
        
        return response()->json($clients);
    }
    
    public function store(Request $request)
    {
        try{
            $client = new Client;

            $client->name = $request->name;
            $client->cpf = $request->cpf;
            $client->phone = $request->phone;
            $client->email = $request->email;

            $client->save();

            return response()->json(['message' => 'Successfully registered']);
        } catch (Exception $e) {

            return response()->json(['message' => 'Register error']);
        } 
    }

    public function show(Request $request, $id) 
    {
        $client = Client::with('adress')->where('id', $id)->get();

        if($request->filled('year', 'month'))
        {
            $salesFilter = Sale::where('client_id', $id)
            ->whereYear('created_at', $request->year)
            ->whereMonth('created_at', $request->month)
            ->orderBy('created_at', 'DESC')
            ->get(); 

            return response()->json([$client, $salesFilter]);
        } else {
            $sales = Sale::where('client_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        
        return response()->json([$client, $sales]);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $client = Client::find($id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            return response()->json(['message' => 'Successfully update']);
        } catch (Exception $e){

            return response()->json(['message' => 'Update error']);
        }     
    }

    public function destroy($id) 
    {
        try {
            $client = Client::find($id)->delete();

            return response()->json(['message' => 'Successfully deleted']);
        } catch (Exception $e){

            return response()->json(['message' => 'Delete error']);
        }  
    }
}