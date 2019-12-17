@extends('layouts.mainapp')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
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
                                <h3 class="login-heading mb-4 mt-2 text-center">Admin Sign In</h3>
                                <form action="{{ route('admin.login') }}" method="post">
                                    @csrf
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autoFocus name="email" value="{{ old('email') }}" />
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="access" />
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <!--
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                                    </div>
                                    -->
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                                    <div class="text-center"><a class="small" href="#">Forgot password?</a></div>
                                    @include('layouts.notify')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


