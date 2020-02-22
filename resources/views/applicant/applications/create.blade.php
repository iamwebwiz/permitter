@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">
                    Submit New Application
                </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ auth()->user()->dashboardLink }}" class="breadcrumb-link">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('applicant.applications') }}" class="breadcrumb-link">Applications</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Submit New Application</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <form action="{{ route('applicant.applications.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="applicationType">Application Type</label>
                            <select name="type" id="applicationType" class="form-control">
                                <option value="">Select Type</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
