@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h1 class="text-center">
                                    <a href="{{ route('home') }}">
                                    <img src="{{ url('img/logo/nigcom-logo.png') }}" alt="logo"/>
                                    </a>
                                </h1>
                                <br/>
                                <h3 class="login-heading mb-4 mt-2 text-center">Registration Success</h3>
                                <p class="text-center">
                                    Congratulations, your Account has been created! You have access to Our Contents for <b>Two Weeks</b> and afterwards, you will be require to use a plan if you are not on any.
                                    <br>
                                <div class="text-center"><a class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" href="{{ route('login') }}">Login.</a></div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


