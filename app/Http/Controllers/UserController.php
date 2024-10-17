<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeemail;

class UserController extends Controller
{
    public function data()
    {
        return view('user.datatable');
    }

    public function basictable()
    {
        return view('user.basictable');
    }

    public function basicdatatable()
    {
        // dd(1);
        return view('user.basicdatatable');
    }
    // public function login(Request $request)
    // {
    // //    return view('user.login');
    //     // dd(Hash::make(1234));
    //     $credentials = $request->validate([

    //         'email' => 'required|email',
    //         'password' => 'required',

    //     ]);
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->route('dashboard');
    //     } else {
    //         return redirect()->back()->with('error', 'Login failed');
    //     }
    // }

    public function login(Request $request)
    {


        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email address',
                'password.required' => 'Password is required',
                'password.password' => 'Please enter a valid password',
            ]

        );

        // Find user by email
      //  $user = User::where('email', $credentials['email'])->first();

        // Check if the user exists and has status = 1
        // if ($user && $user->status == 1) {
        //     // Attempt login
        //     if (Auth::attempt($credentials)) {
        //         return redirect()->route('dashboard');
        //     } else {

        //         return redirect()->back()->with('error', 'Login failed. Invalid credentials.');
        //     }
        // } else {
            // dd($credentials);
            // User either does not exist or status is not 1
          //  return redirect()->back()->with('error', 'email or password is not a valid');
        // }

        // new 
        $user = User::where('email', $credentials['email'])->first();

        // Check if the user exists
        if ($user) {
            
            // Check if the user's account is active (status = 1)
            if ($user->status == 1) {
                // Attempt login
                if (Auth::attempt($credentials)) {
                    return redirect()->route('dashboard');
                } else {
                    // Invalid credentials
                    return redirect()->back()->with('error', 'Login failed. Invalid credentials.');
                }
            } else {
                // User's account is inactive
                return redirect()->back()->with('error', 'Your account is inactive. Please contact support.');
            }
        } else {
            // User does not exist
            return redirect()->back()->with('error', 'Email or password is not valid.');
        }

        // end new code

    }


    public function loginPage(Request $request)
    {
        // dd(1);
        // return view('user.login');
         return view('user.login');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'username' => 'required|string|min:3|max:30',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required|numeric|digits:10'
        ]);

        // $user = User::create([
        //     'username' =>$request->username,
        //     'email' =>$request->email,
        //     'password' =>$request->password,
        //     'mobile' =>$request->mobile,

        // ]);
        $user = User::create($data);


        if ($user) {
            return redirect()->route('loginpage');
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
    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginpage');

        //  return view('dashboard');
    }

    // public function dashboardPage()
    // {
    //     return view('dashboard');
    //     // if(Auth::check()){
    //     //     return view('dashboard');
    //     // }
    // }

    public function showDashboard()
    {
        // dd(auth()->user());
        if (Auth::check()) {
            return view('user.dashboard');
        } else {
            return redirect()->route('loginpage');
            //return redirect()->route('login')->with('error', 'Please log in first.');
        }
        // return view('user.dashboard');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('basicdatatable');
    }

    public function updatePage($id)
    {
        $user = User::find($id);
        return view('user.updateuser', compact('user'));
    }

    public function updateApprove($id)
    {
        $user = User::where(['id' => $id])->update([
            'status' => 1,
        ]);
        if ($user) {
            return redirect()->route('basicdatatable');
        }
    }

    public function updateDisapprove($id)
    {
        $user = User::where(['id' => $id])->update([
            'status' => 0,
        ]);
        if ($user) {
            return redirect()->route('basicdatatable');
        }
    }

    public function updateUser(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required'
        ]);
        $user = User::where(['id' => $request['id']])->update([

            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $request['password'],
            'mobile' => $request['mobile'],
        ]);
        if ($user) {
            return redirect()->route('basicdatatable');
        }
    }

    public function sendEmail($id)
    {
        $user = User::find($id);
        // $toEmail = "aghariaali123@gmail.com";
        // $toEmail = "akbarchaudhari10@gmail.com";
        $toEmail = "fluhar76@gmail.com";
        $moreUser = $user->email;
        $message = "Hello, Welcome to our Website";
        $subject = "Welcome to Zomato";
        $details = [
            'name' => 'Akbarbhai',
            'product' => 'Pizza',
            'price' => '950',
        ];
        $describe = "Thank you for Pizza Order";

        $request = Mail::to($toEmail)->cc($moreUser)->send(new WelcomeEmail($message, $subject, $details, $describe));

        // dd($request);
    }
}
