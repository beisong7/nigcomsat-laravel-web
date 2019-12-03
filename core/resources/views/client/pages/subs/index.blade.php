<?php
$styles = ['style.css'];
$navactive['subs'] = 'active';
?>
@extends('layouts.dashboard')
@section('dashboard')
    <main class="col h-100 dashboard-contents mt-50 pl-5 pr-5">
        {{--<div class="row bg-dark">--}}
        {{--<div class="col-12 py-4">--}}
        {{--Dashboard--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-12 py-4">
                <h3 class="text-muted">My Subscriptions</h3>
                @include('layouts.notify')
                <br>

            </div>

            <div class="col-3 min-h-160">
                <div class="card bg-dark " style="height: 100%">
                    <div class="card-body">
                        <h5 class="text-muted mb-0">Current Subscription</h5>
                        <h2 class="text-muted">{{ $client->plan()->name }}</h2>
                        <br>
                        <p class="text-muted mb-0">Duration : <b>{{ ucfirst($client->plan()->duration) }}</b></p>

                    </div>
                </div>
            </div>
            <div class="col-3 min-h-160">
                <div class="card bg-dark " style="height: 100%">
                    <div class="card-body">
                        <h4 class="text-muted">Days Left</h4>
                        <p class="text-muted mb-0"><small class="fs-12">Starts : {{ date('F d, Y', $client->plan()->start_date) }}</small></p>
                        <p class="text-muted mb-0"><small class="fs-12">Ends : {{ date('F d, Y', $client->plan()->end_date) }}</small></p>
                        <a href="#" class="btn btn-outline-danger btn-block ">{{ $client->plan()->daysLeft() }}</a>
                    </div>
                </div>
            </div>
            <div class="col-3 min-h-160">
                <div class="card bg-dark " style="height: 100%">
                    <div class="card-body">
                        <h3 class="text-muted">Upgrade Plan</h3>
                        <br>
                        <form action="{{ route('pay') }}" method="post">
                            @csrf

                            <input type="hidden" name="tranId" value="{{ $client->transactionId() }}">
                            <input type="hidden" name="amount" value="100000"> {{-- required in kobo --}}
                            <input type="hidden" name="email" value="{{ $client->email }}"> {{-- required --}}
                            <input type="hidden" name="reference" value="{{ \Unicodeveloper\Paystack\Facades\Paystack::genTranxRef() }}"> {{-- required --}}
                            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}

                            <button type="submit" class="btn btn-outline-danger btn-block">Upgrade (₦1000)</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection