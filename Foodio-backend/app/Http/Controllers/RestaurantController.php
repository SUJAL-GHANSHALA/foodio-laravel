<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json($restaurants);
    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            return response()->json($restaurant);
        } else {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $restaurant = Restaurant::create($request->all());
        return response()->json($restaurant, 201);
    }

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            $restaurant->update($request->all());
            return response()->json($restaurant);
        } else {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            $restaurant->delete();
            return response()->json(['message' => 'Restaurant deleted']);
        } else {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }
    }
}
