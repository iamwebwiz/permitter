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

    @include('layouts.partials.alerts')

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
                                @foreach ($vehicleTypes as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <h5>Category</h5>
                            @foreach ($categories as $category)
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="category" value="{{ $category->id }}" class="custom-control-input"><span class="custom-control-label">{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="form-group mt-4">
                            <label for="testScore">Test Score</label>
                            <input type="number" name="test_score" id="testScore" class="form-control" min="0" max="100" placeholder="e.g. 50">
                        </div>

                        <div class="form-group mt-4">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="e.g. Lagos">
                        </div>

                        <div class="form-group">
                            <label for="residentialAddress">Residential Address</label>
                            <input type="text" class="form-control" name="residential_address" id="residentialAddress" placeholder="e.g. Ajah, Lagos">
                        </div>

                        <input type="hidden" name="longitude" value="0">
                        <input type="hidden" name="latitude" value="0">

                        <button type="submit" class="btn btn-primary mt-4 p-3 font-18 btn-rounded btn-block btn-md">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key={{ config('permitter.google_places_api_key') }}&libraries=places"></script>

    <script>
        const autoComplete = new google.maps.places.Autocomplete(document.getElementById('residentialAddress'));

        google.maps.event.addListener(autoComplete, 'place_changed', function () {
            const place = autoComplete.getPlace();
            document.querySelector('input[name=longitude]').value = place.geometry.location.lng();
            document.querySelector('input[name=latitude]').value = place.geometry.location.lat();
        });
    </script>
@stop
