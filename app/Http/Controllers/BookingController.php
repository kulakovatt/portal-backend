<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Tours;
use App\Models\Users;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function tours_for_select(){
        $tours = new Tours();
        return response()->json(['tours' => $tours->all()]);
    }

    public function ticket_reserv(BookingRequest $request){
        $booking = new Booking();
        $users = new Users();
        $id_user = $users->where('email', $request->email)->get('id')[0]->id;
        $booking->id_user = $id_user;
        $booking->id_tour = $request->id_tour;
        $booking->country = $request->country;
        $booking->city = $request->city;
        $booking->experience = $request->experience;
        $booking->save();

        return response()->json(['alert' => 'Билет забронирован успешно!']);
    }
}
