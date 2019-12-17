<?php
    $styles = ['admin_style.css'];
    $navactive['dashboard'] = 'active';
?>
@extends('layouts.admin_dashboard')
@section('admin_board')
    <main class="col h-100 dashboard-contents mt-50 pl-4 pr-4">

        <div class="row mt-5">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow">
                    <div class="card-body text-muted">
                        <h5><i class="fa fa-users"></i> Clients </h5>
                        <p>{{ $users->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow">
                    <div class="card-body text-muted">
                        <h5><i class="fa fa-play"></i> Subscriptions </h5>
                        <p>{{ $subs->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow">
                    <div class="card-body text-muted">
                        <h5><i class="fa fa-dollar-sign"></i> Payments </h5>
                        <p>{{ $pays->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow">
                    <div class="card-body text-muted">
                        <h5><i class="fa fa-user-circle"></i> Admin </h5>
                        <p>{{ $administrators->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection