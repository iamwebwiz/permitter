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
}
