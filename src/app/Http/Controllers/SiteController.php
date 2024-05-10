<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function course(): View
    {

    }

}
