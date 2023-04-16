<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Reviews;
use App\Models\Users;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function add_review(ReviewRequest $request){
        $review = new Reviews();
        $users = new Users();
        $review->id_user = $users->where('email', $request->email)->get('id')[0]->id;
        $review->review = $request->review_area;

        $review->save();

        return response()->json(['alert' => 'Отзыв добавлен успешно!']);
    }

    public function get_reviews(){
        $review = new Reviews();
        $users = new Users();
        $review_users = [];
        $reviews = $review->all();
        foreach ($reviews as $item){
            $firstname = $users->where('id', $item->id_user)->get('firstname')[0]->firstname;
            $lastname = $users->where('id', $item->id_user)->get('lastname')[0]->lastname;
            $date = date_format($item->created_at,"d.m.Y");
            array_push($review_users, ['firstname' => $firstname, 'lastname' => $lastname, 'date' => $date,
                                            'review' => $item->review]);
        }

        return response()->json(['reviews_users' => $review_users]);
    }
}
