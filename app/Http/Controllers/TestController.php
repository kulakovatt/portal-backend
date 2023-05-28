<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Test;
use App\Models\Users;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function add_test_result(TestRequest $request){
        $test_result = new Test();
        $user = new Users();
        $id_user = $user->where('email', $request->email)->get('id')[0]->id;
        $all_points = 0;

        if ($request->q1 == 1){
            $all_points += 0;
        } elseif ($request->q1 == 2){
            $all_points += 1;
        } elseif ($request->q1 == 3){
            $all_points += -1;
        }

        if ($request->q2 == 1){
            $all_points += 1;
        } elseif ($request->q2 == 2){
            $all_points += 0;
        } elseif ($request->q2 == 3){
            $all_points += -1;
        }

        if ($request->q3 == 1){
            $all_points += -1;
        } elseif ($request->q3 == 2){
            $all_points += 0;
        } elseif ($request->q3 == 3){
            $all_points += 1;
        }

        if ($request->q4 == 1){
            $all_points += -1;
        } elseif ($request->q4 == 2){
            $all_points += 0;
        } elseif ($request->q4 == 3){
            $all_points += 1;
        }

        if ($request->q5 == 1){
            $all_points += 1;
        } elseif ($request->q5 == 2){
            $all_points += 0;
        } elseif ($request->q5 == 3){
            $all_points += -1;
        }

        if ($request->q6 == 1){
            $all_points += -1;
        } elseif ($request->q6 == 2){
            $all_points += 0;
        } elseif ($request->q6 == 3){
            $all_points += 1;
        }

        if ($request->q7 == 1){
            $all_points += 0;
        } elseif ($request->q7 == 2){
            $all_points += 1;
        } elseif ($request->q7 == 3){
            $all_points += 0;
        }

        if ($request->q8 == 1){
            $all_points += 1;
        } elseif ($request->q8 == 2){
            $all_points += 0;
        } elseif ($request->q8 == 3){
            $all_points += -1;
        }

        if ($request->q9 == 1){
            $all_points += 1;
        } elseif ($request->q9 == 2){
            $all_points += 0;
        } elseif ($request->q9 == 3){
            $all_points += -1;
        }

        if ($request->q10 == 1){
            $all_points += 1;
        } elseif ($request->q10 == 2){
            $all_points += 0;
        } elseif ($request->q10 == 3){
            $all_points += -1;
        }

        if ($all_points < 0){
            $all_points = 0;
        }

        $test_result->points = $all_points;
        $test_result->id_user = $id_user;

        $test_result->save();
        return response()->json(['result' => $all_points, 'alert' => 'Тест пройден успешно!']);
    }

    public function get_points_users(Request $req){
        $tests = new Test();
        $users = new Users();
        $id_user = $users->where('email', $req->email)->get('id')[0]->id;
        $test_result = $tests->where('id_user', $id_user)->get('points')[0]->points;

        return response()->json($test_result);
    }
}
