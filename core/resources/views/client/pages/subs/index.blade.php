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
                        <h2 class="text-muted">{{ $client->c_sub()->plan->name }}</h2>
                        <br>
                        <p class="text-muted mb-0">Duration : <b>{{ ucfirst($client->current_sub('duration')) }}</b></p>

                    </div>
                </div>
            </div>
            <div class="col-3 min-h-160">
                <div class="card bg-dark " style="height: 100%">
                    <div class="card-body">
                        <h4 class="text-muted">Days Left</h4>
                        <p class="text-muted mb-0"><small class="fs-12">Starts : {{ date('F d, Y', $client->current_sub('start_date')) }}</small></p>
                        <p class="text-muted mb-0"><small class="fs-12">Ends : {{ date('F d, Y', $client->current_sub('end_date')) }}</small></p>
                        <a href="#" class="btn btn-outline-danger btn-block ">{{ $client->c_sub()->daysLeft() }}</a>
                    </div>
                </div>
            </div>
            <div class="col-3 min-h-160">
                <div class="card bg-dark " style="height: 100%">
                    <div class="card-body">
                        <h3 class="text-muted">Buy Plan</h3>
                        <br>
                        <a href="{{ route('client.shop.plan') }}" class="btn btn-outline-danger btn-block">Buy Plan</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card bg-dark">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="bg-black">
                            <tr class="text-grey">
                                <th scope="col">Client</th>
                                <th scope="col">Plan</th>
                                <th scope="col">Days Left</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($client->subs as $sub)
                                <tr>
                                    <td>{{ $sub->client->names }}</td>
                                    <td>{{ $sub->plan->name }}</td>
                                    <td>{{ $sub->daysLeft() }}</td>
                                    <td>{{ $sub->plan->cost }}</td>
                                    <td>{{ $sub->status() }}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-dark btn-sm">View</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm">Disable</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><p class="text-center">No Active Client Found</p></td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection