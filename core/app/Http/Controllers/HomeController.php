<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Client as Clients;
use GuzzleHttp as guzzler;
use Illuminate\Http\Request;



class HomeController extends IptvController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home.index');
    }

    public function subscribe($type){
        return view('pages.forms.register')->with('type', $type);
    }

    public function login(){
        return view('pages.forms.login');
    }

    public function plan(){
        return view('pages.home.plans');
    }

    public function channels(){

        $client = new Client(['timeout'  => 30.0,]);
        $url = "https://api.cleeng.com/3.0/json-rpc";
        $response = null;

        $jsonForm = [

            'method'=>'listVodOffers',
            'params'=>[
                'publisherToken'=>env('CLEENG_API', ''),
                'criteria'=>[],
                'offset'=>0,
                'limit'=>12,
            ],
            'jsonrpc'=>2.0,
            'id'=>1
        ];

        try{
            $request = $client->request('POST', $url,['json' => [$jsonForm]]);

            $response = $request->getBody()->getContents();
            $response = json_decode($response);
//            return response()->json($response[0]->result);

        }catch (\Exception $e){

//            return response()->json([
//                'error' => true,
//                'message'=> $e->getMessage(),
//            ], 200);
        }
        return view('pages.channels.index')->with('listVods', $response[0]);
//        return $response;
    }

    public function formSuccess($unid){
        //find client
        $client = Clients::whereUnid($unid)->first();
        return view('pages.forms.success')->with('client', $client);
    }

    public function logout(Request $request, $guard){
        auth($guard)->logout();
//        Auth::guard($guard)->logout();
        return redirect()->route('home');
    }
}
