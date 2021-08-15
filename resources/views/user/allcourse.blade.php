@extends('user.master')

@section('content')
    <div class="main-content container p-md-0 allcourse">
        <div class="row">
            <div class="col-12 col-sm-6 col-courses">
                <div class="card">
                    <div class="logo">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('images/acourse_machine_learning.png') }}" alt="">
                            </div>
                            <div class="col-9 text-left">
                                <h2 class="font-weight-bold">HTML Fundamentals</h2>
                                <p>Practice during lessons, practice between lessons, 
                                    practice whenever you can. Master the task, 
                                    then reinforce and test your knowledge with fun, 
                                    hands-on exercises and interactive quizzes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row content-statistic">
                            <div class="col-sm-4 col-4">
                                <span class="title">Courses</span>
                                <span class="number">1,586</span>
                            </div>
                            <div class="col-sm-4 col-4">
                                <span class="title">Lessons</span>
                                <span class="number">2,689</span>
                            </div>
                            <div class="col-sm-4 col-4">
                                <span class="title">Learners</span>
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
@endsection
