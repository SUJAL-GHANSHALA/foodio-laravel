<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::all();
        return response()->json($meals);
    }

    public function show($id)
    {
        $meal = Meal::find($id);
        if ($meal) {
            return response()->json($meal);
        } else {
            return response()->json(['message' => 'Meal not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $meal = Meal::create($request->all());
        return response()->json($meal, 201);
    }

    public function update(Request $request, $id)
    {
        $meal = Meal::find($id);
        if ($meal) {
            $meal->update($request->all());
            return response()->json($meal);
        } else {
            return response()->json(['message' => 'Meal not found'], 404);
        }
    }

    public function destroy($id)
    {
        $meal = Meal::find($id);
        if ($meal) {
            $meal->delete();
            return response()->json(['message' => 'Meal deleted']);
        } else {
            return response()->json(['message' => 'Meal not found'], 404);
        }
    }
}
