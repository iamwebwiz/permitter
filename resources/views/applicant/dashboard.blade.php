@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Welcome, {{ auth()->user()->name }}!</h1>
        </div>
    </div>
@stop
