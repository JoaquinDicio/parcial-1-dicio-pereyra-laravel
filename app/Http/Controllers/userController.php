<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User; 

class userController extends Controller
{
    public function registerUser(Request $request){
        $user = new User(); 

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = ($request->input('password'));
        $user->role_id = 1;

        $user->save(); // guarda todito
    }
}
