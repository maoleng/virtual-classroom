@extends('theme.master')

@section('body')

    <div class="rbt-error-area bg-gradient-11 rbt-section-gap">
        <div class="error-area">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-10">
                        <h1 class="title">SUCCESS!</h1>
                        <h3 class="sub-title">Payment Successfully</h3>
                        <p>You have bought <b>{{ $course->name }}</b></p>
                        <p>You can start learning from now</p>
                        <a class="rbt-btn btn-gradient icon-hover" href="{{ route('course.show', ['slug' => $course->slug]) }}">
                            <span class="btn-text">Start Now</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
