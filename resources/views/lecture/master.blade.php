<!DOCTYPE html>
<html lang="en">
<body class="rbt-header-sticky">
@include('theme.head_tag')
<div class="rbt-lesson-area bg-color-white">
    <div class="rbt-lesson-content-wrapper">
        <div class="rbt-lesson-leftsidebar">
            <div class="rbt-course-feature-inner rbt-search-activation">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Course Content</h4>
                </div>

                <div class="lesson-search-wrapper">
                    <form action="#" class="rbt-search-style-1">
                        <input class="rbt-search-active" type="text" placeholder="Search Lesson">
                        <button class="search-btn disabled"><i class="feather-search"></i></button>
                    </form>
                </div>

                <hr class="mt--10">

                <div class="rbt-accordion-style rbt-accordion-02 for-right-content accordion">


                    <div class="accordion" id="accordionExampleb2">

                        @foreach ($course->lectures as $i => $each_lecture)
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingTwo1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#collapseTwo{{ $i }}" aria-controls="collapseTwo{{ $i }}">
                                        {{ $each_lecture->order.'. '.$each_lecture->name }}
                                    </button>
                                </h2>
                                <div id="collapseTwo{{ $i }}" class="accordion-collapse collapse show" aria-labelledby="headingTwo1">
                                    <div class="accordion-body card-body">
                                        <ul class="rbt-course-main-content liststyle">

                                            <li>
                                                <a href="{{ route('course.lecture', ['slug' => $course->slug, 'lecture_slug' => Str::slug($each_lecture->name)]) }}">
                                                    <div class="course-content-left">
                                                        <i class="feather-play-circle"></i> <span class="text">Lesson Video</span>
                                                    </div>
                                                    <div class="course-content-right">
                                                        <span class="min-lable">{{ $each_lecture->study_minutes }} mins</span>
                                                        <span class="rbt-check"><i class="feather-check"></i></span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('course.lecture_document', ['slug' => $course->slug, 'lecture_slug' => Str::slug($each_lecture->name)]) }}">
                                                    <div class="course-content-left">
                                                        <i class="feather-file-text"></i> <span class="text">Document</span>
                                                    </div>
                                                    <div class="course-content-right">
                                                        <span class="rbt-check"><i class="feather-check"></i></span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('course.lecture_question', ['slug' => $course->slug, 'lecture_slug' => Str::slug($each_lecture->name)]) }}">
                                                    <div class="course-content-left">
                                                        <i class="feather-activity"></i> <span class="text">Question</span>
                                                    </div>
                                                    <div class="course-content-right">
                                                        <span class="rbt-check"><i class="feather-check"></i></span>
                                                    </div>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>


                </div>
            </div>
        </div>

        <div class="rbt-lesson-rightsidebar overflow-hidden lesson-video">
            <div class="lesson-top-bar">
                <div class="lesson-top-left">
                    <div class="rbt-lesson-toggle">
                        <button class="lesson-toggle-active btn-round-white-opacity" title="Toggle Sidebar"><i class="feather-arrow-left"></i></button>
                    </div>
                    <h5>{{ $lecture->order.'. '.$lecture->name }}</h5>
                </div>
                <div class="lesson-top-right">
                    <div class="rbt-btn-close">
                        <a href="{{ route('course.show', ['slug' => $course->slug]) }}" title="Go Back to Course" class="rbt-round-btn"><i class="feather-x"></i></a>
                    </div>
                </div>
            </div>

            @yield('body')

            <div class="bg-color-extra2 ptb--15 overflow-hidden">
                <div class="rbt-button-group">

                    <a class="@if ($previous_lecture_url === null) disabled @endif rbt-btn icon-hover icon-hover-left btn-md bg-primary-opacity" href="{{ $previous_lecture_url }}">
                        <span class="btn-icon"><i class="feather-arrow-left"></i></span>
                        <span class="btn-text">Previous</span>
                    </a>

                    <a class="@if ($next_lecture_url === null) disabled @endif rbt-btn icon-hover btn-md" href="{{ $next_lecture_url }}">
                        <span class="btn-text">Next</span>
                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>


<div class="rbt-progress-parent">
    <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
@include('theme.script')
</body>

</html>
