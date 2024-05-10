@extends('lecture.master')

@section('body')
    <div class="content">
        <div class="section-title">
            <h4 class="rbt-title-style-3">Interact with lecturer</h4>
        </div>
        <div class="has-show-more-inner-content rbt-featured-review-list-wrapper">
            <div class="rbt-course-review about-author">
                <div class="media">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="{{ authed()->avatar }}" alt="Author Images">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="author-info">
                            <h5 class="title">
                                <a class="hover-flip-item-wrapper" href="#">
                                    {{ authed()->name }}
                                </a>
                            </h5>
                        </div>
                        <div class="">
                            <p class="description">At 29 years old, my favorite compliment is being
                                told that I look like my mom. Seeing myself in her image, like this
                                daughter up top.</p>
                            <small>22/07/2023 23:05:30</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rbt-course-review about-author">
                <div class="media">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="{{ $course->user->avatar }}" alt="Author Images">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="author-info">
                            <h5 class="title">
                                <a class="hover-flip-item-wrapper" href="#">
                                    {{ $course->user->name }}
                                </a>
                            </h5>
                        </div>
                        <div class="">
                            <p class="description">At 29 years old, my favorite compliment is being
                                told that I look like my mom. Seeing myself in her image, like this
                                daughter up top.</p>
                            <small>22/07/2023 23:05:30</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-color-white rbt-shadow-box">

            <form action="#">
                <div class="assinment-answer-form">
                    <textarea rows="4" placeholder="Add your question here."></textarea>
                </div>

                <label for="images" class="drop-container rbt-custom-file-upload mt--30">
                    <span class="mb--0 h5">Drop files here</span>
                    or
                    <input type="file" id="images" accept="image/*" required>
                </label>
            </form>



            <div class="submit-btn mt--35">
                <a class="rbt-btn btn-gradient hover-icon-reverse" href="#">
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text">Enter</span>
                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    </span>
                </a>
            </div>
        </div>

    </div>
@endsection
