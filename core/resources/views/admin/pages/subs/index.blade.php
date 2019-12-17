<?php
$styles = ['admin_style.css'];
$navactive['subs'] = 'active';
?>
@extends('layouts.admin_dashboard')
@section('admin_board')
    <main class="col h-100 dashboard-contents mt-50 pl-4 pr-4">
        <div class="row ">
            <div class="col-12 py-4">
                <h5>Subscriptions</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        List of Subscriptions
                    </div>
                </div>

                <div class="card mt-3 shadow">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="bg-dark">
                            <tr class="text-white">
                                <th scope="col">Client</th>
                                <th scope="col">Plan</th>
                                <th scope="col">Days Left</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($subs as $sub)
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
                                    <td colspan="6"><p class="text-center">No Subscription Found</p></td>
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