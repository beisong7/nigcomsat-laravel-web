<?php
    $styles = ['admin_style.css'];
    $navactive['plans'] = 'active';
?>
@extends('layouts.admin_dashboard')
@section('admin_board')
    <main class="col h-100 dashboard-contents mt-50 pl-4 pr-4">
        <div class="row ">
            <div class="col-12 py-4">
                <h5><a href="{{ route('plan.index') }}" class="">Plans</a> | New Plan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <span class=""><b>Create A New Plan</b></span>
                    </div>
                </div>

                <div class="card mt-3 shadow mb-5">
                    <div class="card-body">
                        <div class="container">
                            <form action="{{ route('plan.store') }}" method="post">
                                @csrf
                                <div class="row pt-5">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for=""><b>Plan Name</b></label>
                                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Name of Plan" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for=""><b>Plan Info</b></label>
                                            <input type="text" class="form-control" name="info" autocomplete="off" placeholder="One Week, One Month, etc" value="{{ old('info') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for=""><b>Plan Cost (Words)</b></label>
                                            <input type="text" class="form-control" name="cost" autocomplete="off" placeholder="Amount in words" value="{{ old('cost') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for=""><b>Plan Price (Value)</b></label>
                                            <input type="number" class="form-control" name="price" autocomplete="off" placeholder="Amount in value" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for=""><b>Plan Type</b></label>
                                            <input type="text" class="form-control" name="type" autocomplete="off" placeholder="Free, Paid" value="{{ old('type') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for=""><b>Plan Duration</b></label>
                                            <input type="number" class="form-control" name="days" autocomplete="off" placeholder="Days of Duration" value="{{ old('days') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for=""><b>Duration Information</b></label>
                                            <textarea type="text" class="form-control" name="duration_info" autocomplete="off" placeholder="Duration Information">{{ old('duration_info') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-primary text-uppercase m-w-50" type="submit">Create Plan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection