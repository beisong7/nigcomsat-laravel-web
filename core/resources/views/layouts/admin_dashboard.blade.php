@extends('layouts.mainapp')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.components.sidebar')

            @yield('admin_board')
        </div>
    </div>

@endsection