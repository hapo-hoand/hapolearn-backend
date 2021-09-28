@extends('master')

@section('content')
    <div class="banner-hapo-learn">
        <div class="row w-100 m-0">
            <div class="col-12 p-0">
                <div class="bg-img"></div>
            </div>
            <div class="col-12 content-banner">
                <div class="content">
                    <div class="text-detaill">
                        <span class="text-motto">Learn AnyTime, AnyWhere</span>
                        <span class="text-add">at HapoLearn <img src="{{ asset('images/owl.png') }}" class="img-fluid" alt="img">!</span>
                        <small>Interective lessons, "on-the-go" <br> practice, peer support</small>
                        <a href="{{ route('allcourse') }}"><span class="text-time">Start Learning Now!</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="top-content"></div>
    <div class="main-content container p-md-0">
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-lg col-md-4 col-sm-12 col-courses">
                <div class="card">
                    <div class="logo thumbnail lg-html">
                        <img class="card-img-top" src="{{ asset('images/html.png') }}" class="img-fluid" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <span class="card-title">{{ $course->name }}</span>
                        <p class="card-text">{{ $course->desc }}</p>
                        <a href="{{ route('course.detail', ['id' => $course->id]) }}" class="btn link-course">Take This Course</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="courses">
            <span class="other-course">
                <span class="font-weight-bold title">Other Courses</span>
                <span class="line"></span>
            </span>
        </div>

        <div class="row">
            @foreach ($otherCourse as $course)
                <div class="col-lg col-md-4 col-sm-12 col-courses">
                    <div class="card" >
                        <div class="logo thumbnail lg-css">
                            <img class="card-img-top" src="{{ asset('images/css.png') }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <span class="card-title">{{ $course->name}}</span>
                            <p class="card-text">{{ $course->desc }}</p>
                            <a href="{{ route('course.detail', ['id' => $course->id]) }}" class="btn link-course">Take This Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="courses course-view">
            <span class="other-course view">
                <a href="{{ route('allcourse') }}" class="link-view">View All Our Courses <span class="icon-arrow"></span></a>
            </span>
        </div>
    </div>
    <div class="banner-why-hapolearn">
        <div class="img-keyboard">
            <img src="{{ asset('images/keyboard.png') }}" alt="hapo">
        </div>
        <div class="lesson-content container">
            <div class="row align-items-end ">
                <div class="col-lg-6 col-md-7 p-md-0 col-sm-12 custom-col p-0">
                    <div class="text-why-hapo">
                        <div class="text">
                            <div class="big-text">
                                Why HapoLearn?
                            </div>
                            <div class="lesson">
                                <p class="text-lesson"> <span class="icon fas fa-check-circle mx-sm-1 mx-md-2"></span> Interactive lessons, "on-the-go" practice, peer support.</p>
                                <p class="text-lesson"> <span class="icon fas fa-check-circle mx-sm-1 mx-md-2"></span> Interactive lessons, "on-the-go" practice, peer support.</p>
                                <p class="text-lesson"> <span class="icon fas fa-check-circle mx-sm-1 mx-md-2"></span> Interactive lessons, "on-the-go" practice, peer support.</p>
                                <p class="text-lesson"> <span class="icon fas fa-check-circle mx-sm-1 mx-md-2"></span> Interactive lessons, "on-the-go" practice, peer support.</p>
                                <p class="text-lesson"> <span class="icon fas fa-check-circle mx-sm-1 mx-md-2"></span> Interactive lessons, "on-the-go" practice, peer support.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-12 custom-col">
                    <div class="img-laptop">
                        <img src="{{ asset('images/lap.png') }}" alt="hapo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="container feed-back">
        <div class="courses txt-feed-back">
            <span class="other-course">
                <span class="font-weight-bold title">FeedBack</span>
                <span class="line"></span>
            </span>
            <span class="text-detail-feedback">What other students turned professionals have to say about us after learning with us and reaching their goals</span>
        </div>
        <div class="row mx-auto my-auto p-lg-3 p-md-5 p-sm-5 justify-content-center">
            <section class="autoplay slider">
                <div class="carousel-item slide-item active">
                    <div class="col-courses col-slide">
                        <div class="item">
                            <div class="comment">
                                <span class="line"></span>
                                <span class="mess">
                                    <small> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</small>
                                </span>
                            </div>
                            <div class="info">
                                <span class="avt-author">
                                    <img src="{{ asset('images/avt_1.png') }}" alt="img">
                                </span>
                                <div class="data">
                                    <span class="font-weight-bold"> Hoang Anh Nguyen </span>
                                    <span> PHP </span>
                                    <span><img src="{{ asset('images/star.png') }}" alt="img"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item slide-item">
                    <div class="col-courses col-slide">
                        <div class="item">
                            <div class="comment">
                                <span class="line"></span>
                                <span class="mess">
                                    <small> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</small>
                                </span>
                            </div>
                            <div class="info">
                                <span class="avt-author">
                                    <img src="{{ asset('images/avt_1.png') }}" alt="img">
                                </span>
                                <div class="data">
                                    <span class="font-weight-bold"> Hoang Anh Nguyen </span>
                                    <span> C# </span>
                                    <span><img src="{{ asset('images/star.png') }}" alt="img"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item slide-item">
                    <div class="col-courses col-slide">
                        <div class="item">
                            <div class="comment">
                                <span class="line"></span>
                                <span class="mess">
                                    <small> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</small>
                                </span>
                            </div>
                            <div class="info">
                                <span class="avt-author">
                                    <img src="{{ asset('images/avt_1.png') }}" alt="img">
                                </span>
                                <div class="data">
                                    <span class="font-weight-bold"> Hoang Anh Nguyen </span>
                                    <span> Python </span>
                                    <span><img src="{{ asset('images/star.png') }}" alt="img"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item slide-item">
                    <div class="col-courses col-slide">
                        <div class="item">
                            <div class="comment">
                                <span class="line"></span>
                                <span class="mess">
                                    <small> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</small>
                                </span>
                            </div>
                            <div class="info">
                                <span class="avt-author">
                                    <img src="{{ asset('images/avt_1.png') }}" alt="img">
                                </span>
                                <div class="data">
                                    <span class="font-weight-bold"> Hoang Anh Nguyen </span>
                                    <span> Java </span>
                                    <span><img src="{{ asset('images/star.png') }}" alt="img"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item slide-item">
                    <div class="col-courses col-slide">
                        <div class="item">
                            <div class="comment">
                                <span class="line"></span>
                                <span class="mess">
                                    <small> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</small>
                                </span>
                            </div>
                            <div class="info">
                                <span class="avt-author">
                                    <img src="{{ asset('images/avt_1.png') }}" alt="img">
                                </span>
                                <div class="data">
                                    <span class="font-weight-bold"> Hoang Anh Nguyen </span>
                                    <span> C++ </span>
                                    <span><img src="{{ asset('images/star.png') }}" alt="img"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item slide-item">
                    <div class="col-courses col-slide">
                        <div class="item">
                            <div class="comment">
                                <span class="line"></span>
                                <span class="mess">
                                    <small> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</small>
                                </span>
                            </div>
                            <div class="info">
                                <span class="avt-author">
                                    <img src="{{ asset('images/avt_1.png') }}" alt="img">
                                </span>
                                <div class="data">
                                    <span class="font-weight-bold"> Hoang Anh Nguyen </span>
                                    <span> NodeJS </span>
                                    <span><img src="{{ asset('images/star.png') }}" alt="img"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>        
        </div>
    </nav>
    <div class="banner-learning">
        <div class="container justify-content-center align-items-center h-100 w-100 d-flex">
            <div class="content-learning">
                <span class="big-text">Become a member of our growing community!</span>
                <span class="text-time">Start Learning Now!</span>
            </div>
        </div>
    </div>
    <div class="statistic">
        <div class="container-fluid">
            <div class="courses">
                <span class="other-course">
                    <span class="font-weight-bold title">Statistic</span>
                    <span class="line"></span>
                </span>
            </div>
            <div class="row content-statistic">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <span class="title">Courses</span>
                    <span class="number">{{ $allCourse->count() }}</span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <span class="title">Lessons</span>
                    <span class="number">{{ $numberLesson }}</span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <span class="title">Learners</span>
                    <span class="number">{{ $numberLearner }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
