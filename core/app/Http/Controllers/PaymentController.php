<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack;


class PaymentController extends IptvController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Payment::paginate(30);
        return view('admin.pages.payments.index')->with('pays', $pays);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function redirectToGateway(Request $request){
        //todo create transaction id and add to request from front
//        return $request->all();
        $payment = new Payment();
        $payment->unid = $this->unidid(100)."_PAY";
        $payment->reference = $request->input('reference');
        $payment->plan_key = $request->input('plan_key');
        $payment->kobo =  $request->input('amount');
        $payment->amount =  $request->input('amount');
        $payment->success = false;
        $payment->email = $request->input('email');
        $payment->status = "Attempting";
        $payment->start = time();
        $payment->client_key = Auth::guard('client')->unid;
        $payment->save();
        try{

            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch (\Exception $e){
            return back()->withMessage("Oops! Unable to complete. Please try again shortly.");
        }
    }

    public function handleGatewayCallback(Request $request){
        $paymentDetails = Paystack::getPaymentData();

//        dd($paymentDetails);

        //handle all required callbacks
        $email = $paymentDetails['data']['customer']['email'];
        $status = $paymentDetails['data']["status"];

        $reference = $paymentDetails['data']["reference"];
        $payment = Payment::where('reference', $reference)->first();
        $plan = Plan::where('unid', $payment->plan_key)->first();

        if($paymentDetails['status']){

            //get client

            if($status==='success'){

                $dclient = Client::where('email', $email)->first();

                $payment->status = $status;
                $payment->ends = time();
                $payment->gateway_message = $paymentDetails['data']["gateway_response"];

                $payment->update();

                //deactivate old sub
                $old_sub = $dclient->c_sub();
                $old_sub->active = false;
                $old_sub->update();

                //activate new subscription
                $sub = new Subscription();
                $sub->unid = 'SU'.$this->unidid(117).'BS';
                $sub->plan_key = $plan->unid;
                $sub->client_key = $dclient->unid;
                $sub->payment_key = $payment->unid;
                $sub->active = true;
                $sub->start_date = time();
                $sub->end_date = time() + $plan->duration + $old_sub->subTimeLeft();
                $sub->duration = $plan->info;
                $sub->duration_type = $plan->type;
                $sub->save();

                //todo - REDIRECT TO CORRECT ROUTE


                return redirect()->route('plans', ['payment'=>'success', 'email'=>$email]);

            }

        }

        $email = $paymentDetails['data']['customer']['email'];
        return redirect()->route('plans', ['payment'=>'failed', 'email'=>$email]);

        //

    }


}
