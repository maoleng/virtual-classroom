<?php

use App\Enums\UserRole;
use App\Lib\Helper\MapService;
use App\Lib\JWT\JWT;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

if (! function_exists('c')) {
    function c(string $key)
    {
        return App::make($key);
    }
}

if (! function_exists('services')) {
    function services(): MapService
    {
        return c(MapService::class);
    }
}

if (! function_exists('getJsonData')) {
    function getJsonData(): array
    {
        return request()->all();
    }
}

if (! function_exists('getFilters')) {
    function getFilters(Request $request): array
    {
        $raw = $request->query->get('_filter', '');
        $data = [];
        $raws = array_filter(explode(';', $raw));
        foreach ($raws as $item) {
            $items = explode(':', $item);
            if (is_array($items) && count($items) >= 2) {
                $data[array_shift($items)] = implode(':', $items);
            }
        }

        return $data;
    }
}

if (! function_exists('currentFunction')) {
    function currentFunction(): string
    {
        $action_name = Route::getCurrentRoute()->getActionName();

        return explode('@', $action_name)[1];
    }
}

if (! function_exists('authedIsTeacher')) {
    function authedIsTeacher(): bool
    {
        return c('authed')->role === UserRole::TEACHER;
    }
}

if (! function_exists('authedIsStudent')) {
    function authedIsStudent(): bool
    {
        return c('authed')->role === UserRole::STUDENT;
    }
}

if (! function_exists('prettyPrice')) {
    function prettyPrice($price): string
    {
        return number_format($price).' VND';
    }
}

