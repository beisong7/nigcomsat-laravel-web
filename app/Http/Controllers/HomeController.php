<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('pages.forms.register');
    }

    public function login(){
        return view('pages.forms.login');
    }

    public function plan(){
        return view('pages.home.plans');
    }
}
