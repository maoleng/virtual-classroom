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
                                    <h4 class="title">Input your lecture script</h4>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea></textarea>
                                        <label>Content</label>
                                        <span class="focus-border"></span>
                                    </div>
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
                        <a class="rbt-btn hover-icon-reverse bg-primary-opacity w-100 text-center" href="{{ route('lecture.preview_transform_video') }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Preview</span>
                                    <span class="btn-icon"><i class="feather-eye"></i></span>
                                    <span class="btn-icon"><i class="feather-eye"></i></span>
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
            let cur = 1
            $('#btn-back').on('click', () => {
                $('#btn-s-back').click()
                cur--
                if (cur === 0) {
                    cur = 5
                }
                $('textarea').val(changeText())
            })
            $('#btn-next').on('click', () => {
                $('#btn-s-next').click()
                cur++
                if (cur === 6) {
                    cur = 1
                }
                $('textarea').val(changeText())
            })
            function changeText()
            {
                switch (cur) {
                    case 1:
                        return 'Đây là bài giảng Môn Lịch sử Đảng'
                    case 2:
                        return 'Chương đầu tiên là ĐẢNG CỘNG SẢN VIỆT NAM RA ĐỜI VÀ LÃNH ĐẠO ĐẤU TRANH GIÀNH CHÍNH QUYỀN năm 1930 đến 1945'
                    case 3:
                        return 'Ở đây chúng ta sẽ tìm hiểu về 2 mục. Đảng Cộng sản Việt Nam ra đời và Cƣơng lĩnh chính trị đầu tiên của Đảng. Đảng lãnh đạo  quá trình đấu giải phóng dân tộc, giành chính quyền'
                    case 4:
                        return 'Đây là demo slide thứ 4'
                    case 5:
                        return 'Đây là demo slide thứ 5'
                }
            }
        })
    </script>
@endsection
