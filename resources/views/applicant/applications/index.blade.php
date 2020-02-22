@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">
                    My Applications
                    <span class="float-right">
                        <a class="btn btn-primary btn-rounded" href="" data-toggle="modal" data-target="#newUserModal">New Application</a>
                    </span>
                    <span class="clearfix"></span>
                </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ auth()->user()->dashboardLink }}" class="breadcrumb-link">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Applications</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop
