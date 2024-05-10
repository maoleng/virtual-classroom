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
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseOne" aria-expanded="true" aria-controls="accCollapseOne">Course Info
                                        </button>
                                    </h2>
                                    <div id="accCollapseOne" class="accordion-collapse collapse show" aria-labelledby="accOne" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body">
                                            <!-- Start Course Field Wrapper  -->
                                            <div class="rbt-course-field-wrapper rbt-default-form">
                                                <div class="course-field mb--15">
                                                    <label for="field-1">Course Name</label>
                                                    <input id="field-1" type="text" placeholder="New Course">
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Name should be 20 characters.</small>
                                                </div>

                                                <div class="course-field mb--15">
                                                    <label for="field-1">Course Title</label>
                                                    <input id="field-1" type="text" placeholder="New Course">
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Title should be 30 characters.</small>
                                                </div>

                                                <div class="course-field mb--15">
                                                    <label for="aboutCourse">About Course</label>
                                                    <textarea id="aboutCourse" rows="10"></textarea>
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> HTML or plain text allowed, no emoji This field is used for search, so please be descriptive!</small>
                                                </div>

                                                <div class="course-field mb--20">
                                                    <label class="form-check-label d-inline-block" for="flexSwitchCheckDefault2">Q&A</label>
                                                    <div class="form-check form-switch mb--10">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault2">
                                                    </div>
                                                    <small><i class="feather-info"></i> Enable
                                                        Q&A section for your course</small>
                                                </div>
                                            </div>
                                            <!-- End Course Field Wrapper  -->
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseTwo" aria-expanded="false" aria-controls="accCollapseTwo">
                                            Course Intro Video
                                        </button>
                                    </h2>
                                    <div id="accCollapseTwo" class="accordion-collapse collapse" aria-labelledby="accTwo" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body rbt-course-field-wrapper rbt-default-form">

                                            <div class="course-field mb--15">
                                                <label for="videoUrl">Add Your Youtube Video URL</label>
                                                <input id="videoUrl" type="text" placeholder="Add Your Video URL here.">
                                                <small class="d-block mt_dec--5">Example: <a href="https://www.youtube.com/watch?v=yourvideoid">https://www.youtube.com/watch?v=yourvideoid</a></small>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseThree" aria-expanded="false" aria-controls="accCollapseThree">
                                            Course Fee
                                        </button>
                                    </h2>
                                    <div id="accCollapseThree" class="accordion-collapse collapse" aria-labelledby="accThree" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body">
                                            <div class="rbt-course-settings-content">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="advance-tab-button advance-tab-button-1">
                                                            <ul class="rbt-default-tab-button nav nav-tabs" id="coursePrice" role="tablist">
                                                                <li class="nav-item w-100" role="presentation">
                                                                    <a href="#" class="active" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid" role="tab" aria-controls="paid" aria-selected="true">
                                                                        <span>Paid</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item w-100" role="presentation">
                                                                    <a href="#" id="free-tab" data-bs-toggle="tab" data-bs-target="#free" role="tab" aria-controls="free" aria-selected="false">
                                                                        <span>Free</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade advance-tab-content-1 active show" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                                                                <div class="course-field mb--15">
                                                                    <label for="regularPrice-1">Price (VND)</label>
                                                                    <input id="regularPrice-1" type="number" placeholder="VND Regular Price">
                                                                    <small class="d-block mt_dec--5 pt--10"><i class="feather-info"></i> The Course Price Includes Your Author Fee.</small>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade advance-tab-content-1" id="free" role="tabpanel" aria-labelledby="free-tab">
                                                                <div class="course-field">
                                                                    <p class="b3">This Course is free for everyone.</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accSeven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseEight" aria-expanded="false" aria-controls="accCollapseEight">
                                            Course Thumbnail
                                        </button>
                                    </h2>
                                    <div id="accCollapseEight" class="accordion-collapse collapse" aria-labelledby="accSeven" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body">

                                            <div class="rbt-create-course-thumbnail upload-area">
                                                    <div class="upload-area">
                                                        <div class="brows-file-wrapper" data-black-overlay="9">
                                                            <!-- actual upload which is hidden -->
                                                            <input name="createinputfile" id="createinputfile" type="file" class="inputfile" />
                                                            <img id="createfileImage" src="{{ asset('assets/images/others/thumbnail-placeholder.svg') }}" alt="file image">
                                                            <!-- our custom upload button -->
                                                            <label class="d-flex" for="createinputfile" title="No File Choosen">
                                                                <i class="feather-upload"></i>
                                                                <span class="text-center">Choose a File</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            <small><i class="feather-info"></i> <b>Size:</b> 700x430 pixels, <b>File
                                                    Support:</b> JPG, JPEG, PNG, GIF, WEBP</small>

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
                                <a class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center" href="#">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Create Course</span>
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
                                    <h4 class="title">Course Upload Tips</h4>
                                </div>
                                <div class="rbt-course-upload-tips">
                                    <ul class="rbt-list-style-1">
                                        <li><i class="feather-check"></i> Set the Course Price option or make it free.
                                        </li>
                                        <li><i class="feather-check"></i> Standard size for the course thumbnail is
                                            700x430.</li>
                                        <li><i class="feather-check"></i> Video section controls the course overview
                                            video.</li>
                                        <li><i class="feather-check"></i> Prerequisites refers to the fundamental
                                            courses to complete before taking this particular course.</li>
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
