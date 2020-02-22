<?php

namespace App\Http\Controllers\Reviewer;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function show(Application $application)
    {
        return view('reviewer.applications.show', compact('application'));
    }
}
