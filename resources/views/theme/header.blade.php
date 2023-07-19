<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>
    <div class="rbt-header-wrapper header-space-betwween header-transparent header-sticky">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-start align-items-center">
                <div class="header-left rbt-header-content">
                    <div class="header-info">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li class="with-megamenu">
                                <a href="/">Home</a>
                            </li>

                            <li class="with-megamenu has-menu-child-item position-static">
                                <a href="{{ route('course.index') }}">Courses <i class="feather-chevron-down"></i></a>
                                <div class="rbt-megamenu menu-skin-dark">
                                    <div class="wrapper">
                                        <div class="row row--15 home-plesentation-wrapper single-dropdown-menu-presentation">

                                            @foreach ($courses as $course)
                                                <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                                    <div class="demo-single">
                                                        <div class="inner">
                                                            <div class="thumbnail">
                                                                <a href="{{ route('course.show', ['slug' => $course->slug]) }}"><img src="{{ $course->thumbnail }}" alt="Demo Images"></a>
                                                            </div>
                                                            <div class="content">
                                                                <h4 class="title"><a href="{{ route('course.show', ['slug' => $course->slug]) }}">{{ $course->name }} <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- End Single Demo  -->

                                            <!-- Start Single Demo  -->
                                            <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item coming-soon">
                                                <div class="demo-single">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="{{ route('course.index') }}"><img src="{{ asset('assets/images/splash/demo/coming-soon-3.png') }}" alt="Demo Images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h4 class="title"><a href="{{ route('course.index') }}">Others<span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Demo  -->
                                        </div>

                                        <div class="load-demo-btn text-center">
                                            <a class="rbt-btn-link color-white" href="#">Scroll to view more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z" />
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="with-megamenu">
                                <a href="#">About</a>
                            </li>

                            <li class="with-megamenu">
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <ul class="quick-access">
                    <li class="account-access rbt-user-wrapper d-none d-xl-block">
                        @if (authed() === null)
                            <a class="rbt-btn btn-gradient btn-gradient-2" href="{{ route('auth.redirect') }}">Login</a>
                        @else
                            <a href="#"><i class="feather-user"></i>{{ authed()->name }}</a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
                                            <img src="{{ authed()->avatar }}" alt="User Images">
                                        </div>
                                        <div class="admin-info">
                                            <span class="name">{{ authed()->name }}</span>
                                            <a class="rbt-btn-link color-primary" href="#">View Profile</a>
                                        </div>
                                    </div>
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="#">
                                                <i class="feather-home"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="#">
                                                <i class="feather-settings"></i>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('auth.logout') }}">
                                                <i class="feather-log-out"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </li>

                    <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                        @if (authed() === null)
                            <a class="rbt-btn btn-gradient btn-gradient-2" href="{{ route('auth.redirect') }}">Login</a>
                        @else
                            <a class="rbt-round-btn" href="#"><i class="feather-user"></i></a>
                            <div class="rbt-user-menu-list-wrapper">
                            <div class="inner">
                                <div class="rbt-admin-profile">
                                    <div class="admin-thumbnail">
                                        <img src="{{ authed()->avatar }}" alt="User Images">
                                    </div>
                                    <div class="admin-info">
                                        <span class="name">{{ authed()->name }}</span>
                                        <a class="rbt-btn-link color-primary" href="#">View Profile</a>
                                    </div>
                                </div>
                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="#">
                                            <i class="feather-home"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                </ul>
                                <hr class="mt--10 mb--10">
                                <ul class="user-list-wrapper">
                                    <li>
                                        <a href="#">
                                            <i class="feather-settings"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('auth.logout') }}">
                                            <i class="feather-log-out"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                    </li>

                </ul>

                <div class="header-right">
                    <div class="rbt-btn-wrapper d-none d-xl-block">
                        <a class="rbt-btn rbt-marquee-btn marquee-auto btn-border-gradient radius-round btn-sm hover-transform-none" href="{{ route('course.index') }}">
                            <span data-text="Purchase Now">Start Learning</span>
                        </a>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->
                </div>
            </div>
        </div>
    </div>
</header>
