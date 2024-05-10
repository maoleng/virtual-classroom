@php use App\Enums\UserRole; @endphp
@extends('theme.master')

@section('body')
    <div class="rbt-rbt-card-area rbt-section-gap bg-color-extra2">
        <div class="container">
            <div class="row row--15 align-items-center mb--30">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title">Choose Your Role First</h2>
                    </div>
                </div>
            </div>
            <!-- Start Card Area -->
            <div class="row row--15">
                <!-- Start Single Card  -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt--30" data-sal-delay="150" data-sal="slide-up"
                     data-sal-duration="800">
                    <div class="rbt-card variation-01 rbt-hover card-list-2">
                        <div class="rbt-card-img">
                            <a href="{{ route('process_choose_role', ['role' => UserRole::STUDENT]) }}">
                                <img src="https://cdn-icons-png.flaticon.com/512/5850/5850276.png" alt="Card image">
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h4 class="rbt-card-title"><a
                                    href="{{ route('process_choose_role', ['role' => UserRole::STUDENT]) }}">Student</a>
                            </h4>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button"
                                   href="{{ route('process_choose_role', ['role' => UserRole::STUDENT]) }}">Next<i>
                                        <svg width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                <path d="M10.614 0l5.629 5.629-5.63 5.629"/>
                                                <path stroke-linecap="square" d="M.663 5.572h14.594"/>
                                            </g>
                                        </svg>
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt--30" data-sal-delay="150" data-sal="slide-up"
                     data-sal-duration="800">
                    <div class="rbt-card variation-01 rbt-hover card-list-2">
                        <div class="rbt-card-img">
                            <a href="{{ route('process_choose_role', ['role' => UserRole::TEACHER]) }}">
                                <img src="https://cdn-icons-png.flaticon.com/512/1995/1995574.png" alt="Card image">
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h4 class="rbt-card-title"><a
                                    href="{{ route('process_choose_role', ['role' => UserRole::TEACHER]) }}">Teacher</a>
                            </h4>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button"
                                   href="{{ route('process_choose_role', ['role' => UserRole::TEACHER]) }}">Next<i>
                                        <svg width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                <path d="M10.614 0l5.629 5.629-5.63 5.629"/>
                                                <path stroke-linecap="square" d="M.663 5.572h14.594"/>
                                            </g>
                                        </svg>
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->
            </div>
            <!-- End Card Area -->
        </div>
        <br><br><br><br>
    </div>

@endsection
