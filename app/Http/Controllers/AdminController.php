<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tours;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function all_passangers(){
        $tours = Tours::all();

        // Разделение пассажиров по турам
        $passengersByTour = [];

        foreach ($tours as $tour) {
            $tourName = $tour->name;

            // Получение пассажиров для текущего тура в обратном порядке
            $passengers = Booking::select('booking.*', 'users.firstname', 'users.lastname',
                          'users.email', 'users.gender', 'users.birthday')
                ->join('users', 'booking.id_user', '=', 'users.id')
                ->where('booking.id_tour', $tour->id)
                ->orderBy('booking.created_at', 'desc')
                ->get();

            // Добавление пассажиров в подмассив для текущего тура

            foreach ($passengers as $key => $passenger) {
                $passenger->queue = count($passengers) - $key; // Определение позиции в очереди
                $passengersByTour[$tourName][] = $passenger;
            }
        }

        return response()->json($passengersByTour);
    }
}
