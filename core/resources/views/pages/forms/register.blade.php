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
                                <h3 class="login-heading mb-0 mt-2 text-center">Sign Up</h3>
                                <p class="text-center mb-3">Register and have an amazing experience</p>
                                <form method="post" action="{{ route('client.reg') }}">
                                    @csrf
                                    <div class="form-label-group">
                                        <input type="text" id="inputFullname" class="form-control" placeholder="Full Name" required autoFocus name="names"/>
                                        <label for="inputFullname">Full Names</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputPhone" class="form-control" placeholder="Phone Number" required  name="phone"/>
                                        <label for="inputPhone">Phone</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required  name="email"/>
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="access"/>
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <input type="hidden" name="sub_type" value="{{ $type }}">

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="terms" name="terms"/>
                                        <label class="custom-control-label" for="terms">I Accept the <a href="#">terms & conditions</a></label>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign Up</button>
                                    <div class="text-center"><a class="small" href="{{ route('login') }}">I have an account.</a></div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

