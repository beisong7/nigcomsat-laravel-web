<?php
$styles = ['style.css'];
$navactive['shop'] = 'active';
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
                <h3 class="text-muted">Get New Plans</h3>
                @include('layouts.notify')
                <br>

            </div>

            @forelse($plans as $plan)
                <div class="col-3 min-h-160">
                    <div class="card bg-dark " style="height: 100%">
                        <div class="card-body">
                            <h3 class="text-muted">{{ $plan->name }}</h3>
                            <br>
                            <form action="{{ route('shop.pay') }}" method="post">
                                @csrf

                                <input type="hidden" name="tranId" value="{{ $client->transactionId() }}">
                                <input type="hidden" name="amount" value="{{ $plan->prices() }}"> {{-- required in kobo --}}
                                <input type="hidden" name="plan_key" value="{{ $plan->unid }}"> {{-- required to monitor plan --}}
                                <input type="hidden" name="email" value="{{ $client->email }}"> {{-- required --}}
                                <input type="hidden" name="reference" value="{{ \Unicodeveloper\Paystack\Facades\Paystack::genTranxRef() }}"> {{-- required --}}
                                <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}

                                <button type="submit" class="btn btn-outline-danger btn-block">Buy at {{ number_format($plan->price, 0) }} Naira </button>
                            </form>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 min-h-160">
                    <div class="card bg-dark " style="height: 100%">
                        <div class="card-body">
                            <h2 class="text-muted">No Plan Available</h2>
                            <br>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>

    </main>
@endsection