<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return City::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'state' => 'required|integer|exists:states,id',
            'city' => 'required|string'
        ]);

        $newCity = new City();
        $newCity->state = $request->get('state');
        $newCity->name = $request->get('city');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        $findCity = City::find($city);
        if (!$findCity) {
            return response()->json([
                'error' => true,
                'message' => 'city not found'
            ]);
        }
        return response()->json([
            'success' => true,
            'result' => $findCity
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $findCity = City::find($city);
        if (!$findCity) {
            return response()->json([
                'error' => true,
                'message' => 'city not found'
            ]);
        }

        $findCity->state = $request->state;
        $findCity->name = $request->city;
        $findCity->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
