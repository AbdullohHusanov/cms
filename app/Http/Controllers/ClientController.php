<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Auth::routes();
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $client = new Client();
        $client->user = $request->user()->id;
        $client->iabs_id = $request->iabs_id;
        $client->type_certificate = $request->type_certificate;
        $client->type_client = $request->type_client;
        $client->name_owner = $request->name_owner;
        $client->full_name_director = $request->full_name_director;
        $client->full_name_accountant = $request->full_name_accountant;
        $client->state = $request->state;
        $client->city = $request->city;
        $client->region = $request->region;
        $client->street = $request->street;
        $client->email = $request->email;
        $client->organization = $request->organization;
        $client->divisions = $request->divisions;
        $client->inn = $request->inn;
        $client->pinfl = $request->pinfl;
        $client->phone = $request->phone;
        $client->token_type = $request->token_type;
        $client->serial_number_token = $request->serial_number_token;
        $client->document_file = $request->document_file;
        $client->save();

        return response()->json([
            'success' => true,
            'data' => $client
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client, $id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json([
                'error' => true,
                'message' => 'not found'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
