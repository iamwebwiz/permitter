<?php

namespace App\Repositories;

use App\Application;

class ApplicationRepository
{
    public function getUserApplications($userId)
    {
        return Application::whereUserId($userId)->get();
    }

    public function storeNewApplication($userId, $request)
    {
        return Application::create([
            'user_id' => $userId,
            'vehicle_type_id' => $request->type,
            'application_category_id' => $request->category,
            'test_score' => $request->test_score,
            'state' => $request->state,
            'residential_address' => $request->residential_address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
    }

    public function getApplicationStatistics(): array
    {
        $applications = Application::all();

        $data = [];

        $data['all'] = $applications;

        $data['pending'] = $applications->filter(static function ($application) {
            return $application->status === Application::PENDING_STATUS ? $application : [];
        });

        $data['approved'] = $applications->filter(static function ($application) {
            return $application->status === Application::PROCESSED_STATUS ? $application : [];
        });

        $data['rejected'] = $applications->filter(static function ($application) {
            return $application->status === Application::DECLINED_STATUS ? $application : [];
        });

        return $data;
    }
}
