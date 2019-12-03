@extends('layouts.mainapp')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('client.components.sidebar')

            @yield('dashboard')
        </div>
    </div>

@endsection