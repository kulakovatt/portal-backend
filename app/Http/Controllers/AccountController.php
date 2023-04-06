<?php

namespace App\Http\Controllers;
use App\Http\Requests\InfoRequest;
use App\Models\Users;
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
        if ($req->email){
            $user = $users->where('email', $req->email)->get();
        }

        return response()->json(['user_data' => $user[0]]);
    }
}
