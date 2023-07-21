@extends('theme.master')

@section('body')
    <main class="rbt-main-wrapper">

        <div class="rbt-create-course-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row g-5">

                    <div class="swiper rbt-gif-banner-area rbt-arrow-between col-lg-8">
                        <div class="swiper-wrapper">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="swiper-slide">
                                    <div class="thumbnail">
                                        <a href="?p={{ $i }}">
                                            <img class="rbt-radius w-100" src="{{ asset("assets/images/transform-video/$i.jpg") }}" alt="Banner Images">
                                        </a>
                                    </div>
                                </div>
                            @endfor

                        </div>



                        <div id="btn-s-back" class="rbt-swiper-arrow rbt-arrow-right">
                            <div class="custom-overfolow">
                                <i class="rbt-icon feather-arrow-right"></i>
                                <i class="rbt-icon-top feather-arrow-right"></i>
                            </div>
                        </div>
                        <div id="btn-s-next" class="rbt-swiper-arrow rbt-arrow-left">
                            <div class="custom-overfolow">
                                <i class="rbt-icon feather-arrow-left"></i>
                                <i class="rbt-icon-top feather-arrow-left"></i>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="rbt-create-course-sidebar course-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                            <div class="inner">
                                <div class="section-title mb--30">
                                    <h4 class="title">Lecturer</h4>
                                </div>
                                <div class="col-lg-12">
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset('assets/images/transform-video/1.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                                <div class="form-submit-group">
                                    <button id="btn-back" type="submit" class="rbt-btn btn-md btn-gradient">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Back</span>
                                        </span>
                                    </button>
                                    <button id="btn-next" type="submit" class="rbt-btn btn-md btn-gradient">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Next</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-submit-group">
                        <a class="rbt-btn hover-icon-reverse bg-primary w-100 text-center" href="course-details.html">
                            <span class="icon-reverse-wrapper">
                                <span class="btn-text">Export</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const video = $('video')[0]

            let cur = 1
            $('#btn-back').on('click', () => {
                $('#btn-s-back').click()
                cur--
                if (cur === 0) {
                    cur = 5
                }
                changeVideo()
            })
            $('#btn-next').on('click', () => {
                $('#btn-s-next').click()
                cur++
                if (cur === 6) {
                    cur = 1
                }
                changeVideo()
            })
            function changeVideo()
            {
                $('source').attr('src', '{{ asset('assets/images/transform-video/') }}' + '/' + cur + '.mp4')
                video.load()
                video.play()
            }
        })
    </script>
@endsection
