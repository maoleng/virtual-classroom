@extends('theme.master')

@section('body')
    <main class="rbt-main-wrapper">

        <div class="rbt-create-course-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row g-5">

                    <div class="col-lg-8">
                        <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                            <div class="accordion" id="tutionaccordionExamplea1">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseOne" aria-expanded="true" aria-controls="accCollapseOne">Lecture Info
                                        </button>
                                    </h2>
                                    <div id="accCollapseOne" class="accordion-collapse collapse show" aria-labelledby="accOne" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body">
                                            <!-- Start Course Field Wrapper  -->
                                            <div class="rbt-course-field-wrapper rbt-default-form">
                                                <div class="course-field mb--15">
                                                    <label for="field-1">Course</label>
                                                    <input class="disabled" id="field-1" type="text" placeholder="New Course" value="{{ $course->name }}">
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Name should be 20 characters.</small>
                                                </div>

                                                <div class="course-field mb--15">
                                                    <label for="field-1">Lecture Name</label>
                                                    <input id="field-1" type="text" placeholder="Lecture title">
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Name should be 20 characters.</small>
                                                </div>

                                                <div class="course-field mb--15">
                                                    <label for="aboutCourse">Lecture Document</label>
                                                    <textarea id="aboutCourse" rows="10"></textarea>
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> HTML or plain text allowed, no emoji This field is used for search, so please be descriptive!</small>
                                                </div>

                                            </div>
                                            <!-- End Course Field Wrapper  -->
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accSeven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseEight" aria-expanded="false" aria-controls="accCollapseEight">
                                            Lecture Content
                                        </button>
                                    </h2>
                                    <div id="accCollapseEight" class="accordion-collapse collapse" aria-labelledby="accSeven" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body">

                                            <div class="rbt-create-course-thumbnail upload-area">
                                                <form action="#">
                                                    <label for="images" class="drop-container rbt-custom-file-upload mt--30">
                                                        <span class="mb--0 h5">Drop files here</span>
                                                        or
                                                        <input type="file" id="images" accept="image/*" required>
                                                    </label>
                                                </form>
                                                </div>

                                            <small><i class="feather-info"></i>
                                                <br>
                                                <b>PPTX for: </b>Create Lecture Video By Artificial Intelligence
                                                <br>
                                                <b>MP4, MKV, AVI for: </b>Create Course Immediately
                                            </small>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt--10 row g-5">
                            <div class="col-lg-4">
                                <a class="rbt-btn hover-icon-reverse bg-primary-opacity w-100 text-center" href="course-details.html">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Preview</span>
                                    <span class="btn-icon"><i class="feather-eye"></i></span>
                                    <span class="btn-icon"><i class="feather-eye"></i></span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <a class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center" href="{{ route('lecture.transform_video') }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Create Lecture</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="rbt-create-course-sidebar course-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                            <div class="inner">
                                <div class="section-title mb--30">
                                    <h4 class="title">Lecture Upload Tips</h4>
                                </div>
                                <div class="rbt-course-upload-tips">
                                    <ul class="rbt-list-style-1">
                                        <li><i class="feather-check"></i> Set the Lecture Name option or make it free.
                                        </li>
                                        <li><i class="feather-check"></i> Create the lecture document</li>
                                        <li><i class="feather-check"></i> Upload pptx for create lecture by using AI or video for normal uploading</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
