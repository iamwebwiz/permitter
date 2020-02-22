@extends('layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.css') }}">
@stop

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">
                    My Applications
                    <span class="float-right">
                        <a class="btn btn-primary btn-rounded" href="{{ route('applicant.applications.create') }}">New Application</a>
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

    @include('layouts.partials.alerts')

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    @if ($applications->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">TEST SCORE</th>
                                    <th scope="col">STATE</th>
                                    <th scope="col">RESIDENTIAL ADDRESS</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">DATE SUBMITTED</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $application->vehicle->name }}</td>
                                            <td>{{ $application->category->name }}</td>
                                            <td>{{ $application->test_score }}</td>
                                            <td>{{ $application->state }}</td>
                                            <td>{{ $application->residential_address }}</td>
                                            <td>{{ strtoupper($application->status) }}</td>
                                            <td>{{ $application->created_at->format('jS F, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-center text-danger">You have not applied for any permit or driver&rsquo;s license</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $('table.table').DataTable();
    </script>
@stop
