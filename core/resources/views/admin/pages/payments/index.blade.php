<?php
$styles = ['admin_style.css'];
$navactive['pays'] = 'active';
?>
@extends('layouts.admin_dashboard')
@section('admin_board')
    <main class="col h-100 dashboard-contents mt-50 pl-4 pr-4">
        <div class="row ">
            <div class="col-12 py-4">
                <h5>Payments</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        List of Payments
                    </div>
                </div>

                <div class="card mt-3 shadow">
                    <div class="card-body">
                        <table class="table table-responsive">

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection