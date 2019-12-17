<?php
    $styles = ['admin_style.css'];
    $navactive['plans'] = 'active';
?>
@extends('layouts.admin_dashboard')
@section('admin_board')
    <main class="col h-100 dashboard-contents mt-50 pl-4 pr-4">
        <div class="row ">
            <div class="col-12 py-4">
                <h5>Plans</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('plan.create') }}" class="btn btn-outline-dark btn-sm">New <i class="fa fa-plus"></i></a>
                        <span class="float-right">List of Plans</span>
                    </div>
                </div>

                <div class="card mt-3 shadow">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="bg-dark">
                            <tr class="text-white">
                                <th scope="col">Name</th>
                                <th scope="col">Info</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $paln)
                                <tr>
                                    <td>{{ $paln->name }}</td>
                                    <td>{{ $paln->info }}</td>
                                    <td>{{ $paln->days() }}</td>
                                    <td>{{ $paln->cost }}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-dark btn-sm">View</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm">Disable</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection