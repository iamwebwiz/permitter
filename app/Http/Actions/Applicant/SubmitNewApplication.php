<?php

namespace App\Http\Actions\Applicant;

use App\Http\Requests\Applicant\NewApplicationRequest;
use App\Jobs\ApplicationSuccessNotification;
use App\Repositories\ApplicationRepository;
use App\User;

class SubmitNewApplication
{
    public function execute(NewApplicationRequest $request, ApplicationRepository $applicationRepository)
    {
        $application = $applicationRepository->storeNewApplication(auth()->id(), $request);

        if (! $application) {
            return back()->with([
                'type' => 'danger',
                'message' => 'Unable to create application. Please review and try again.',
            ]);
        }

        User::all()->filter(static function ($user) {
            if ($user->isReviewer()) {
                dispatch(new ApplicationSuccessNotification([
                    'reviewer' => $user,
                ]));
            }
        });


        return redirect()->route('applicant.applications')->with([
            'type' => 'success',
            'message' => 'Application sent successfully. You will be notified of the progress.',
        ]);
    }
}
