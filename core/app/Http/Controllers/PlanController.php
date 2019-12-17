<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends IptvController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::where('active', true)->paginate(30);
        return view('admin.pages.plan.index')->with('plans', $plans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.plan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = new Plan();
        $plan->unid = "PL".uniqid()."AN".$this->unidid(30);

        $plan->name = $request->input('name');
        $plan->info = $request->input('info');
        $plan->type = $request->input('type');
        $plan->cost = $request->input('cost');
        $price = intval($request->input('price'));
        $plan->price = $price;
        $aday = (60*60*24);
        $days = $request->input('days');
        $plan->duration = $days * $aday;
        $plan->duration_info = $request->input('duration_info');

        $plan->active = true;
        $plan->default = false;
        $plan->creator_key = Auth::user()->unid;
        $plan->save();

        return redirect()->route('plan.index')->withMessage('New Plan Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }

    public function shopplan(){
        $plans = Plan::where('active', true)->where('default', false)->get();
        return view('client.pages.shop.plan')->with('plans', $plans);
    }
}
