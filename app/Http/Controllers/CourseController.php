<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Services\CourseService;

class CourseController extends ApiController
{

    public function getService()
    {
        return c(CourseService::class);
    }

    public function getStoreRequest()
    {
        return c(StoreRequest::class);
    }

    public function getUpdateRequest()
    {
        return c(UpdateRequest::class);
    }


}
