<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;

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
        

       
        if(!is_null($data)) {
            $user=Registration::create($data);
            Artisan::call('search:reindex');
            // $request->session()->put('user',$request->input('name'));
            // Session::flash('success', 'Successfully Registered!');
            return redirect('/signin');
        }
     
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user= Registration::where("email",$request->input('email'))->first();
        if($user){
            if(Crypt::decrypt( $user->password)==$request->input('password'))
            {
                $request->session()->put('users',$user);
                return redirect('index');
            }
            else{
                return back()->with("fail", "Password not matched");
             }
        }
        else{
            return back()->with("fail", "Account not found for this email");
        }
    }

    public function logout(Request $request){
        if(session()->has('users')){
            session()->pull('users');
            return redirect('signin');
        }
    }

    public function search(string $query=''){
        echo "here";
        return Registration::query()
             
        ->Where('name', 'LIKE', "%{$query}%")
        ->orWhere('email', 'LIKE', "%{$query}%")
        ->get();
    }

    public function author(Request $request){

        $request->validate([
            'name'              => 'required|string|max:255|min:3',
            'email'             => 'required|string|email|max:255|unique:registrations',
            'contact'          => 'required|min:10',
           
        ]);
       
        $data=array(
            "name"      => $request->name,
            "email"         => $request->email,
            "contact"      => $request->contact,              

        );
        $user=Author::create($data);
        $request->session()->put('user',$request->input('name'));
            Session::flash('success', 'Successfully Added!');
            return redirect('/author');
        
    }
    public function book(Request $request){

    }
   

}
