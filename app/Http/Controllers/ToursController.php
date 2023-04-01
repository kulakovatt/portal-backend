<?php

namespace App\Http\Controllers;
use App\Models\Images;
use App\Models\Tours;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function all_tours(){
        $tours = Tours::all();
        return response()->json($tours);
    }

    public function get_images(){
        $images = Images::all();
        return response()->json($images);
    }
}
