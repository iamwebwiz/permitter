<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Actions\Applicant\SubmitNewApplication;
use App\Http\Requests\Applicant\NewApplicationRequest;
use App\Repositories\ApplicationRepository;
use App\Http\Controllers\Controller;
use App\VehicleType;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Get authenticated user's applications
     *
     * @param ApplicationRepository $applicationRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ApplicationRepository $applicationRepository)
    {
        return view('applicant.applications.index', [
            'applications' => $applicationRepository->getUserApplications(auth()->id()),
        ]);
    }

    public function create()
    {
        return view('applicant.applications.create', [
            'vehicle_types' => VehicleType::pluck('name')
        ]);
    }

    public function store(Request $request)
    {
        return (new SubmitNewApplication())->execute(new NewApplicationRequest($request->all()));
    }
}
