<?php

namespace App\Http\Controllers\Reviewer;

use App\Repositories\ApplicationRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(ApplicationRepository $applicationRepository)
    {
        return view('reviewer.dashboard', [
            'applications' => $applicationRepository->getApplicationStatistics(),
            'registrants' => User::role(User::APPLICANT_ROLE)->count(),
        ]);
    }
}
