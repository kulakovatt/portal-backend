<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Users;
use App\Rules\PasswordCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(AuthRequest $req)
    {
        $req->validate([
            'password' => [
                new PasswordCheck($req->email)]
        ]);
        $users = new Users();
        $user = $users->where('email', $req->email)->get();
        $role = $users->where('email', $req->email)->get('role')[0]->role;

        if(count($user) != 0){
            return response()->json(['email' => $req->email, 'role' => $role]);
        }

    }

}
