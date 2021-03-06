<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Plan;
use App\Models\Subscription;
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
        $clients = Client::where('active', true)->paginate(30);
        return view('admin.pages.clients.index')->with('clients', $clients);
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

        $auser = Client::where('email', $request->input('email'))->orWhere('phone', $request->input('phone'))->select(['id'])->get();
//        return $auser;
        if($auser->count()>0){
            return back()->withErrors($this->setError(['It appears you already have an account. Please try login in or reset your password.']));
        }


        if($request->input('terms')==='on'){

            $dclient = new Client();
            $dclient->names = $request->input('names');
            $dclient->unid = $this->unidid(120);
            $dclient->phone = $request->input('phone');
            $dclient->email = $request->input('email');
            $dclient->password = bcrypt($request->input('access'));
            $dclient->terms = true;
            $dclient->active = true;


            $dclient->save();

            //get default plan if any and do next line else skip all other actions
            //create a new subscription and add to the client
            $def_plan = Plan::where('default', true)->where('active', true)->first();

            if(!empty($def_plan)){
                $sub = new Subscription();
                $sub->unid = 'SU'.$this->unidid(117).'BS';
                $sub->plan_key = $def_plan->unid;
                $sub->client_key = $dclient->unid;
                $sub->payment_key = null;
                $sub->active = true;
                $sub->start_date = time();
                $sub->end_date = time() + $def_plan->duration;
                $sub->duration = $def_plan->info;
                $sub->duration_type = 'Free';
                $sub->save();
            }

            //send email notification to user
            $this->clientMail($dclient);

            return redirect()->route('form.success', $dclient->unid);
        }
        return back()->withErrors($this->setError(['Agree to terms before proceeding']))->withInput($request->input());

    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('access');
        $credentials = ['email' => $email, 'password' => $password,];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (Auth::guard('client')->attempt($credentials)) {
//                $client = Client::where('email', $email)->first();
//                Auth::login($client, true); // use when implementing remember login credentials
                return redirect()->route('client.dashboard');
            }
            else {
                return back()->withErrors(array('access' => 'Invalid email credentials given'))->withInput($request->input());
            }
        }

        return back()->withErrors(array('access' => 'Invalid email credentials given'))->withInput($request->input());
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

    public function subscription(Request $request){
        return view('client.pages.subs.index');
    }
}
