<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validation
        $attribute = $request->validate([
            'name' => 'required',
            'email'=> 'required | email | unique:users,email',
            'password' => 'required'
        ]);
        // $attribute['password'] = bcrypt('password');

        $user = User::create($attribute);

        //auth
        // Auth::login($user);
        auth()->login($user);

        //return
        return redirect()->route('index');
    }
}
