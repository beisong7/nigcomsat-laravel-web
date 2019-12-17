<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Payment;
use App\Models\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function dashboard(){
        $clients  = Client::where('active', true)->select(['id'])->get();
        $subs = Subscription::where('active', true)->select(['id'])->get();
        $pays = Payment::select(['id'])->get();
        $administrators  = User::where('active', true)->get();

        return view('admin.pages.dashboard.index')
            ->with('users', $clients)
            ->with('subs', $subs )
            ->with('pays', $pays )
            ->with('administrators', $administrators);
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('access');
        $credentials = ['email' => $email, 'password' => $password,];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (Auth::attempt($credentials)) {
//                $client = Client::where('email', $email)->first();
//                Auth::login($client, true); // use when implementing remember login credentials
                return redirect()->route('admin.dashboard');
            }
            else {
                return back()->withErrors(array('access' => 'Invalid email credentials given'))->withInput($request->input());
            }
        }

        return back()->withErrors(array('access' => 'Invalid email credentials given'))->withInput($request->input());
    }
}
