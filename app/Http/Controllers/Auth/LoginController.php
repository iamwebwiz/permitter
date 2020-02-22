<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /** @var string */
    protected const APPLICANT_DASHBOARD_LINK = '/applicant/dashboard';

    /** @var string */
    protected const REVIEWER_DASHBOARD_LINK = '/reviewer/dashboard';

    /** @var string */
    protected const PROCESSOR_DASHBOARD_LINK = '/processor/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect user to after login
     *
     * @return string
     */
    public function redirectTo(): string
    {
        $user = Auth::user();

        if ($user->isProcessor()) {
            return self::PROCESSOR_DASHBOARD_LINK;
        }

        if ($user->isReviewer()) {
            return self::REVIEWER_DASHBOARD_LINK;
        }

        return self::APPLICANT_DASHBOARD_LINK;
    }
}
