<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function store(Request $request){
        

        $request->validate([
            'name'              => 'required|string|max:255|min:3',
            'email'             => 'required|string|email|max:255|unique:registrations',
            'password'          => 'required|alpha_num|min:6',
            'confirm_password'  => 'required|same:password',
        ]);
       
        $data=array(
            "name"      => $request->name,
            "email"         => $request->email,
            "password"      => Crypt::encrypt($request->password)               

        );
        

        $user=Registration::create($data);
        return $user;
    }
}
