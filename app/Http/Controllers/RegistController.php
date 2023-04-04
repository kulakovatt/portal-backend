<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

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
}
