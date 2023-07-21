@extends('lecture.master')

@section('body')
    <div class="inner">
        <div class="content">
            <div class="section-title">
                <h4>The Complete JavaScript Course 2023: From Zero to Expert!.</h4>
                <div class="bg-color-white rbt-shadow-box">
                    <h5 class="rbt-title-style-3">Your Assignment</h5>
                    <p>
                        REQUIREMENTS
                        <br>
                        Write a program with the following parts
                        <br>
                        I – Build menus containing functional information as shown in Figure
                        <br>
                        II – Build 10 functions

                    </p>
                    <div class="submit-btn">
                        <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{ route('course.assignment_submit', ['slug' => $course->slug, 'lecture_slug' => Str::slug($lecture->name)]) }}">
                                        <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Submit Assignment</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
