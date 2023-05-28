<?php

namespace App\Http\Controllers;
use App\Http\Requests\InfoRequest;
use App\Models\Booking;
use App\Models\Tours;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function info(InfoRequest $req){
        $user = new Users();
        $email = str_replace('"', '', $req->userEmail);
        $user->where('email', $email)->update(['firstname' => $req->firstname, 'lastname' => $req->lastname, 'gender' => $req->gender, 'birthday' => $req->birthday]);
        return response()->json(['alert' => 'Личная информация добавлена!']);
    }

    public function get_info(Request $req){
        $users = new Users();
        $booking = new Booking();
        $tours = new Tours();

        $user = $users->where('email', $req->email)->first();

        if ($user) {
            $id_user = $user->id;

            $booking_user = $booking->where('id_user', $id_user)->get();
            $tickets = [];

            foreach ($booking_user as $item) {
                $id_tour = $item->id_tour;
                $name_tour = $tours->where('id', $id_tour)->value('name');
                $duration = $tours->where('id', $id_tour)->value('duration');
                $residence = $tours->where('id', $id_tour)->value('residence');
                $date = $tours->where('id', $id_tour)->value('date_flight');
                $date_flight = Carbon::parse($date)->locale('ru_RU')->isoFormat('D MMMM YYYY');
                $price = $tours->where('id', $id_tour)->value('price');
                $firstname = $user->firstname;
                $lastname = $user->lastname;

                $ticket = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'tour' => $name_tour,
                    'duration' => $duration,
                    'residence' => $residence,
                    'date_flight' => $date_flight,
                    'price' => $price
                ];

                array_push($tickets, $ticket);
            }

            return response()->json(['user_data' => $user, 'tickets' => $tickets]);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }

    }

}
