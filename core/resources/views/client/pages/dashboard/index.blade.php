<?php
    $styles = ['style.css'];
    $scripts = ['listvod.js'];
    $navactive['latest'] = 'active';
?>
@extends('layouts.dashboard')
@section('dashboard')
    <main class="col h-100 dashboard-contents mt-50 pl-5 pr-5">
        {{--<div class="row bg-dark">--}}
            {{--<div class="col-12 py-4">--}}
                {{--Dashboard--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-12 py-4">
                <div class="row list-vids">

                    <div class="center-item text-center load-fin">
                        @include('layouts.loading')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection