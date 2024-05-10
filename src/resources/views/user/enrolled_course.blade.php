@extends('theme.master')

@section('body')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">

            <div class="section-title">
                <h4 class="rbt-title-style-3">Enrolled Courses</h4>
            </div>

            <div class="advance-tab-button mb--30">
                <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="myTab-4" role="tablist">
                    <li role="presentation">
                        <a href="#" class="tab-button active" id="home-tab-4" data-bs-toggle="tab" data-bs-target="#home-4" role="tab" aria-controls="home-4" aria-selected="true">
                            <span class="title">Enrolled Courses</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="tab-button" id="contact-tab-4" data-bs-toggle="tab" data-bs-target="#contact-4" role="tab" aria-controls="contact-4" aria-selected="false">
                            <span class="title">Completed Courses</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="home-4" role="tabpanel" aria-labelledby="home-tab-4">
                    <div class="row g-5">
                        @foreach ($enrolled_courses as $course)
                            <div class="col-lg-4 col-md-6 col-12">
                            <div class="rbt-card variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="{{ route('course.show', ['slug' => $course->slug]) }}">
                                        <img src="{{ $course->thumbnail }}" alt="Card image">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h4 class="rbt-card-title"><a href="{{ route('course.show', ['slug' => $course->slug]) }}">{{ $course->name }}</a>
                                    </h4>
                                    <ul class="rbt-meta">
                                        <li><i class="feather-book"></i>{{ $course->lectures->count() }} Lessons</li>
                                    </ul>

                                    <div class="rbt-progress-style-1 mb--20 mt--10">
                                        <div class="single-progress">
                                            <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                            <div class="progress">
                                                @php ($percent = random_int(20, 100))
                                                <div class="progress-bar wow fadeInLeft bar-color-success" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                                <span class="rbt-title-style-2 progress-number">{{ $percent }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rbt-card-bottom">
                                        <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center" href="#">Learn</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="contact-4" role="tabpanel" aria-labelledby="contact-tab-4">
                    <div class="row g-5">
                        @foreach ($completed_courses as $course)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ route('course.show', ['slug' => $course->slug]) }}">
                                            <img src="{{ $course->thumbnail }}" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h4 class="rbt-card-title"><a href="{{ route('course.show', ['slug' => $course->slug]) }}">{{ $course->name }}</a>
                                        </h4>
                                        <ul class="rbt-meta">
                                            <li><i class="feather-book"></i>{{ $course->lectures->count() }} Lessons</li>
                                        </ul>

                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                            <div class="single-progress">
                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                <div class="progress">
                                                    @php ($percent = random_int(20, 100))
                                                    <div class="progress-bar wow fadeInLeft bar-color-success" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                    <span class="rbt-title-style-2 progress-number">{{ $percent }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rbt-card-bottom">
                                            <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center" href="#">Learn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
