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

        return response()->json(['alert' => 'Отзыв отправлен, ожидает одобрения.']);
    }

    public function get_reviews(){
        $review = new Reviews();
        $users = new Users();
        $review_users = [];
        $reviews = $review->get();
        foreach ($reviews as $item){
            $firstname = $users->where('id', $item->id_user)->get('firstname')[0]->firstname;
            $lastname = $users->where('id', $item->id_user)->get('lastname')[0]->lastname;
            $date = date_format($item->created_at,"d.m.Y");
            array_push($review_users, ['firstname' => $firstname, 'lastname' => $lastname, 'date' => $date,
                                            'review' => $item->review]);
        }

        return response()->json(['reviews_users' => $review_users]);
    }

    public function success_review(Request $req){
        $reviews = new Reviews();

        $success = $reviews->where('id', $req->id)->update(['approval' => 1]);

        if($success) {
            return response()->json(['alert' => 'Отзыв одобрен.']);
        }
    }

    public function failure_review(Request $req){
        $reviews = new Reviews();

        $failure = $reviews->where('id', $req->id)->delete();

        if($failure) {
            return response()->json(['alert' => 'Отзыв удален.']);
        }

    }

    public function all_admin_reviews(){
        $reviews = new Reviews();
        $reviews = $reviews->orderBy('created_at', 'desc')->get();
        $users = new Users();
        $review_users = [];
        foreach ($reviews as $item){
            $firstname = $users->where('id', $item->id_user)->get('firstname')[0]->firstname;
            $lastname = $users->where('id', $item->id_user)->get('lastname')[0]->lastname;
            $date = date_format($item->created_at,"d.m.Y");
            array_push($review_users, ['id' => $item->id, 'firstname' => $firstname, 'lastname' => $lastname, 'date' => $date,
                'review' => $item->review]);
        }

        return response()->json($review_users);
    }
}
