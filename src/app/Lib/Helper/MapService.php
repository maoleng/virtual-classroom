<?php

namespace App\Lib\Helper;

use App\Services\CourseService;
use App\Services\LectureService;
use App\Services\QuestionService;
use App\Services\UserService;
use Psr\Container\ContainerInterface;

class MapService
{

    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function userService(): UserService
    {
        return c(UserService::class);
    }

    public function lectureService(): LectureService
    {
        return c(LectureService::class);
    }

    public function courseService(): CourseService
    {
        return c(CourseService::class);
    }

    public function questionService(): QuestionService
    {
        return c(QuestionService::class);
    }

}
