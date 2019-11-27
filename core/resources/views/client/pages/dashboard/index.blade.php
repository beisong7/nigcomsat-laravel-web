@extends('layouts.mainapp')
@section('content')
    <div class="container">
        <div class="row mt-100">
            <div class="col-3">
                <div class="sidenav">
                    <ul class="list-group">
                        <a href="#" class="list-group-item">Dashboard</a>
                        <a href="#" class="list-group-item">My Favorite</a>
                        <a href="#" class="list-group-item">Tv Series</a>
                        <a href="#" class="list-group-item">Playlist</a>
                        <a href="#" class="list-group-item">Notification</a>
                        <a href="#" class="list-group-item">Settings</a>
                        <a href="#" class="list-group-item">Logout</a>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <h3 class="text-muted">hello {{ $client->names }}</h3>

                    {{ $client->hasAccess()?'Has Access':'No Access' }}

                </div>
            </div>

        </div>
    </div>
@endsection