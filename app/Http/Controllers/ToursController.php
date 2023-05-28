<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddToursRequest;
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

    public function get_tour_info_by_id(Request $req){
        $tours = new Tours();
        $info = $tours->where('id', $req)->first();

        if($info){
            return response()->json($info);
        }
    }

    public function add_tours(AddToursRequest $req){
        $tours = new Tours();

        $tours->name = $req->name;
        $tours->planet = $req->planet;
        $tours->description = $req->description;
        $tours->duration = $req->duration;
        $tours->residence = $req->residence;
        $tours->count_passengers = $req->count_passengers;
        $tours->price = $req->price;
        $tours->date_flight = $req->date_flight;
        $tours->image = $req->image;

        $tours->save();
        return response()->json(['alert' => 'Тур успешно добавлен.']);
    }

    public function edit_tours(Request $req){
        $tours = new Tours();

//        if ($req->image != ''){
//            $result = $tours->where('id', $req->id)->update(['name' => $req->name, 'planet' => $req->planet,
//                'description' => $req->description, 'duration' => $req->duration, 'residence' => $req->residence,
//                'count_passengers' => $req->count_passengers, 'price' => $req->price,
//                'date_flight' => $req->date_flight, 'image' => 'Images/' . $req->image]);
//
//        } else {
//            $result = $tours->where('id', $req->id)->update(['name' => $req->name, 'planet' => $req->planet,
//                'description' => $req->description, 'duration' => $req->duration, 'residence' => $req->residence,
//                'count_passengers' => $req->count_passengers, 'price' => $req->price,
//                'date_flight' => $req->date_flight]);
//        }

        $result = $tours->where('id', $req->id)->update(['description' => $req->description]);

        if($result){
            return response()->json(['alert' => 'Тур успешно изменен.']);
        }

    }

    public function delete_tours(Request $req){
        $tours = new Tours();

        $tours->where('id', $req->id)->delete();

        return response()->json(['alert' => 'Тур удален.']);
    }
}
