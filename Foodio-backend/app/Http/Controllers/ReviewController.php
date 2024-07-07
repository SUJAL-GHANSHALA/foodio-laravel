<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews);
    }

    public function store(Request $request)
    {
        $review = Review::create($request->all());
        return response()->json($review, 201);
    }
}
