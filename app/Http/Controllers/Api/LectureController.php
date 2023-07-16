<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Lecture\StoreRequest;
use App\Http\Requests\Lecture\UpdateRequest;
use App\Services\LectureService;

class LectureController extends ApiController
{

    public function getService()
    {
        return c(LectureService::class);
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
