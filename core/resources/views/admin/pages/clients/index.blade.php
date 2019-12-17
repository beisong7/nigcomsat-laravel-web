<?php
$styles = ['admin_style.css'];
$navactive['clients'] = 'active';
?>
@extends('layouts.admin_dashboard')
@section('admin_board')
    <main class="col h-100 dashboard-contents mt-50 pl-4 pr-4">
        <div class="row ">
            <div class="col-12 py-4">
                <h5>Clients</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        List of Clients
                    </div>
                </div>

                <div class="card mt-3 shadow">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="bg-dark">
                            <tr class="text-white">
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Current Sub</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($clients as $client)
                                <tr>
                                    <td>{{ $client->names }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->c_sub()->plan->name }}</td>
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