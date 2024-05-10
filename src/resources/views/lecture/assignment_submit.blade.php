@extends('lecture.master')

@section('body')
    <div class="inner">
        <div class="content">
            <div class="section-title">
                <h4>The Complete JavaScript Course 2023: From Zero to Expert!.</h4>
                <div class="bg-color-white rbt-shadow-box">
                    <h5 class="rbt-title-style-3">Assignment Submission</h5>

                    <form action="#">
                        <div class="assinment-answer-form">
                            <textarea rows="6" placeholder="Add your assignment content here."></textarea>
                        </div>

                        <label for="images" class="drop-container rbt-custom-file-upload mt--30">
                            <span class="mb--0 h5">Drop files here</span>
                            or
                            <input type="file" id="images" accept="image/*" required>
                        </label>
                    </form>



                    <div class="submit-btn mt--35">
                        <a class="rbt-btn btn-gradient hover-icon-reverse" href="lesson-assignments-submit.html">
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
