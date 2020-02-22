<?php

namespace App\Repositories;

use App\Application;

class ApplicationRepository
{
    public function getUserApplications($userId)
    {
        return Application::whereUserId($userId)->get();
    }
}
