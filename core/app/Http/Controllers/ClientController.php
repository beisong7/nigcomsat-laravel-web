<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends IptvController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function register(Request $request){

        if($request->input('terms')==='on'){
            $client = new Client();
            $client->names = $request->input('names');
            $client->unid = $this->unidid(120);
            $client->phone = $request->input('phone');
            $client->email = $request->input('email');
            $client->password = bcrypt($request->input('access'));
            $client->terms = true;
            $client->active = true;
            $client->save();

            $plan = new Plan();
            $plan->type = $request->input('type');
            $plan->unid = $this->unidid(120);
            $plan->name = '';
            $plan->cost = '';
            $plan->duration = 'two weeks';
            $plan->duration_type = 'week';
            $plan->active = true;
            $plan->creator_key = $client->unid;
            $plan->end_date = $this->timeFromNow(2, 'weeks');
            $plan->start_date = time();
            $plan->save();

            //send email notification to user
            $this->clientMail($client);

            return redirect()->route('form.success', $client->unid);
        }
        return back()->withErrors($this->setError(['Agree to terms before proceeding']));

    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('access');
        $credentials = ['email' => $email, 'password' => $password,];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (Auth::guard('client')->attempt($credentials)) {
                $client = Client::where('email', $email)->first();
//                Auth::login($client, true); // use when implementing remember login credentials
                return redirect()->route('client.dashboard');
            }
            else {
                return back()->withErrors(array('access' => 'Invalid email credentials given'))->withInput($request->input());
            }
        }

        return back()->withErrors(array('access' => 'Invalid email credentials given'))->withInput($request->input());
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('home');
    }

    public function dashboard(){
        return view('client.pages.dashboard.index');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
