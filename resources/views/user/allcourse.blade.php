@extends('user.master')

@section('content')
    <div class="allcourse">
        <div class="container">
            <div class="search d-flex justify-content-center justify-content-sm-start">
                <button class="btn filter"><i class="fas fa-sliders-h"></i> Filter </button>
                <div class="input-group md-form form-sm form-1 input-group-search">
                    <input class="form-control my-0 py-1 input-text" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <span class="input-group-text btn btn-search" id="basic-text1"><i class="fas fa-search text-black"
                            aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-courses">
                    <div class="card custom-card">
                        <div class="logo">
                            <div class="row">
                                <div class="col-3 px-1 px-sm-3">
                                    <img src="{{ asset('images/acourse_machine_learning.png') }}" alt="" class="img-lesson">
                                </div>
                                <div class="col-9 text-left desc">
                                    <p class="font-weight-bold title">HTML Fundamentals</p>
                                    <p class="detail">Practice during lessons, practice between lessons, 
                                        practice whenever you can. Master the task, 
                                        then reinforce and test your knowledge with fun, 
                                        hands-on exercises and interactive quizzes.
                                    </p>
                                    <a href="#" class="btn link-course link-lesson">More</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row content-statistic info-course desc">
                                <div class="col-sm-4 col-4">
                                    <span class="title">Learners</span>
                                    <span class="number">1,586</span>
                                </div>
                                <div class="col-sm-4 col-4">
                                    <span class="title">Lessons</span>
                                    <span class="number">2,689</span>
                                </div>
                                <div class="col-sm-4 col-4">
                                    <span class="title">Quizzes</span>
                                    <span class="number">16,882</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-courses">
                    <div class="card">
                        <div class="logo thumbnail lg-html">
                            <img class="card-img-top" src="{{ asset('images/html.png') }}" class="img-fluid" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <span class="card-title">HTML/CSS/JS Tutorial</span>
                            <p class="card-text">I knew hardly anything about HTML, JS, and CSS before entering New Media. I had coded quite a bit, but never touched anything in regards to web development.</p>
                            <a href="#" class="btn link-course">Take This Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
