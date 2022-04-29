<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
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

    public function show(Client $id) 
    {
        //tem que mostrar as vendas pra o cliente, ordenando e filtrando por mes + ano
        //$clients = Client::all();
        //$client = $clients->find($id); se der errado mais tarde, ta aí o outro código.
        $client = Client::find($id);

        return response()->json($client);
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
    //tem que excluir também as vendas para o cliente.
    {
        try {
            $client = Client::find($id)->delete();

            return response()->json(['message' => 'Successfully deleted']);
        } catch (Exception $e){

            return response()->json(['message' => 'Delete error']);
        }  
    }
}