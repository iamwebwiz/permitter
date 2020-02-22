@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Welcome, {{ auth()->user()->name }}!</h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-header">
                    <h4 class="card-title text-muted">Total Applications</h4>
                </div>
                <div class="card-body">
                    <h1>{{ auth()->user()->applications->count() }}</h1>
                </div>
            </div>
        </div>
    </div>
@stop
