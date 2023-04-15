<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Tours;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function tours_for_select(){
        $tours = new Tours();
        return response()->json(['tours' => $tours->all()]);
    }

    public function ticket_reserv(BookingRequest $request){
        $booking = new Booking();
        $users = new Users();
        $tours = new Tours();
        $name_tour = $tours->where('id', $request->id_tour)->get('name')[0]->name;
        $duration = $tours->where('id', $request->id_tour)->get('duration')[0]->duration;
        $residence = $tours->where('id', $request->id_tour)->get('residence')[0]->residence;
        $date_flight = $tours->where('id', $request->id_tour)->get('date_flight')[0]->date_flight;
        $price = $tours->where('id', $request->id_tour)->get('price')[0]->price;
        $firstname = $users->where('email', $request->email)->get('firstname')[0]->firstname;
        $lastname = $users->where('email', $request->email)->get('lastname')[0]->lastname;
        $id_user = $users->where('email', $request->email)->get('id')[0]->id;
        Session::push('email', $request->email);
        $booking->id_user = $id_user;
        $booking->id_tour = $request->id_tour;
        $booking->country = $request->country;
        $booking->city = $request->city;
        $booking->experience = $request->experience;
        $booking->save();

        Mail::send( 'mail', ['firstname' => $firstname, 'lastname' => $lastname, 'tour' => $name_tour, 'duration' => $duration, 'residence' => $residence, 'date_flight' => $date_flight, 'price' => $price], function ($message){

            $message->to(Session::get('email')[0])->subject('Билет');
            $message->from('portal.team.agency@gmail.com', 'Portal Agency');
        });

        return response()->json(['alert' => 'Билет забронирован успешно!']);
    }
}
