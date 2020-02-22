@extends('layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.css') }}">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Welcome, {{ auth()->user()->name }}!</h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <a href="">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-header">
                        <h4 class="card-title text-muted">TOTAL REGISTRANTS</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $registrants }}</h1>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-header">
                        <h4 class="card-title text-muted">PENDING APPLICATIONS</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $applications['pending']->count() }}</h1>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-header">
                        <h4 class="card-title text-muted">APPROVED APPLICATIONS</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $applications['approved']->count() }}</h1>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-header">
                        <h4 class="card-title text-muted">REJECTED APPLICATIONS</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $applications['rejected']->count() }}</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-header">PENDING APPLICATIONS</div>
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">SUBMITTED BY</th>
                            <th scope="col">VEHICLE</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">DATE SUBMITTED</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications['pending'] as $application)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $application->user->fullName }}</td>
                                    <td>{{ $application->vehicle->name }}</td>
                                    <td>{{ $application->category->name }}</td>
                                    <td>{{ $application->created_at->format('jS F, Y') }}</td>
                                    <td><a href="{{ route('reviewer.applications.show', $application->id) }}" class="btn btn-primary btn-sm">Process</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
