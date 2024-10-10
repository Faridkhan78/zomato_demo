<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function data(){
        return view('user.datatable');
    }

    public function basictable(){
        return view('user.basictable');
    }

    public function basicdatatable(){
        // dd(1);
        return view('user.basicdatatable');
    }
    public function login(Request $request)
    {
      //  return view('user.login');
        // dd(Hash::make(1234));
        $credentials = $request->validate([

            'email' => 'required|email',
            'password' => 'required',

        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Login failed');
        }
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required'
        ]);

        // $user = User::create([
        //     'username' =>$request->username,
        //     'email' =>$request->email,
        //     'password' =>$request->password,
        //     'mobile' =>$request->mobile,

        // ]);
        $user = User::create($data);


        if ($user) {
            return redirect()->route('login');
        }
        // validate request data
        //    $data =$request->validate([
        //         'name' => ['required','string','max:255'],
        //         'email' => ['required','string','email','max:255','unique:users'],
        //         'password' => ['required','string','min:8','confirmed'],
        //         'mobile' => ['required', 'string', 'min:10', 'max:15', 'regex:/^[0-9]+$/'],
        //     ]);

        //     // create new user
        //     $user = User::create($data);

    }
    public function viewUserall(Request $request)
    {
        $user = User::get();
        // dd($user);
       return view('user.basicdatatable', compact('user'));
       // return view('basicdatatable')->with('user', $user);
    }

}
