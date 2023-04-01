<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use App\Http\Requests\RegistRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegistController extends Controller
{
    public function register(RegistRequest $req)
    {
        $user = new Users();
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->save();
        return response()->json(['alert' => 'Пользователь зарегистрирован!']);

    }

    public function info(InfoRequest $req){
        $user = new Users();
        $email = str_replace('"', '', $req->userEmail);
        $user->where('email', $email)->update(['firstname' => $req->firstname, 'lastname' => $req->lastname, 'gender' => $req->gender, 'birthday' => $req->birthday]);
        return response()->json(['alert' => 'Личная информация добавлена!']);
    }
}
