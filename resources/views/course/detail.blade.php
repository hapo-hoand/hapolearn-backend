@extends('master')

@section('content')
    <div class="allcourse">
        <div class="container path">
            Home > All courses > Course detail
        </div>
    </div>
    <div class="course">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-sm-8 ">
                    <div class="row margin-bottom-row">
                        <div class="col">
                            <div class="col-courses">
                                <div class="big-image">
                                    <img src="{{ asset('images/html.png') }}" alt="Card image cap">  
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row margin-bottom-row">
                        <div class="col">
                            <div class="col-courses custom-col-course">
                                <ul class="nav nav-tabs row tab-list tab-course" id="example-tabs" role="tablist">
                                    <li class="nav-item col tab-item">
                                        <a id="lesson-href" class="nav-link active" data-toggle="tab" role="tab"  href="#lesson">Lesson</a>
                                    </li>
                                    <li class="nav-item col tab-item">
                                        <a id="teacher-href" class="nav-link" data-toggle="tab" role="tab"  href="#teacher">Teacher</a>
                                    </li>
                                    <li class="nav-item col tab-item">
                                        <a id="review-href" class="nav-link" data-toggle="tab" role="tab"  href="#review">Review</a>
                                    </li>
                                </ul>
                                  
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="lesson" role="tabpanel" aria-labelledby="lesson-href">
                                        <div class="search-lesson">
                                            <form action="{{ route('course.filter.lesson') }}" method="post" name="advance_search">
                                                <div class="search d-flex justify-content-center justify-content-sm-start">
                                                    <div class="input-group input-group-search">
                                                        <input class="form-control input-text" id="nameLesson" name="key" value="{{ request("key") }}" type="text" placeholder="Search" aria-label="Search">
                                                        <input type="hidden" id="CourseID" name="course_id" value="{{ $course->id }}">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text btn btn-search-icon"><i class="fas fa-search text-black"
                                                                aria-="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-filter mx-3 btn-search btn-search-lesson" type="submit"  id="btnSearchLesson"> Search </button>
                                                </div>
                                            </form>
                                            <div class="get-this-course text-right">
                                                @if ($result == 1)
                                                    <a href="{{ route('course.cancelingcourse', ['id' => $course->id]) }}" id="canceling" class="btn link-course cancel">Take Out This Course </a>
                                                @else
                                                    <a href="{{ route('course.takethiscourse', ['id' => $course->id]) }}" id="takecourse" class="btn link-course">Take This Course</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="list-lessons margin-bottom">
                                            <?php 
                                                if (request("page")) {
                                                    $stt = request("page");
                                                }
                                                else {
                                                    $stt = 1;
                                                }

                                                $i = ($stt-1)*config('variable.pagination') + 1;
                                            ?>
                                            @foreach ($course->lessons as $lesson)
                                                <div class="item-lesson" id="item-lesson">
                                                    <div class="number text-center">
                                                       {{ $i }}.
                                                    </div>
                                                    <div class="desc-lesson">
                                                    <a href="#">{{ $lesson->title }}</a>
                                                    </div>
                                                    <div class="text-right link-lesson">
                                                        <a href="#" class="btn link-course">Learn</a>
                                                    </div>
                                                </div>
                                                <?php $i++ ?>
                                            @endforeach
                                        </div>
                                        {{ $course->lessons->links('layouts.pagination') }}
                                    </div>
                                    <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-href">
                                        <div class="custom-course-row main-teacher">
                                            <div class="text-describe-course custom-font-bold">
                                                Main Teachers
                                            </div>

                                            <div class="list-mentor">
                                                @foreach ($course->teachers as $teacher)
                                                <div class="mentor">
                                                    <div class="info">
                                                        <div class="avt">
                                                            <img src="{{ asset("images/$teacher->avatar") }}" alt="">
                                                        </div>
                                                        <div class="detail d-block w-100">
                                                            <span class="name custom-font-bold">{{ $teacher->name }}</span>
                                                            <span class="experience">Second Year Teacher</span>
                                                            <div class="logo d-flex">
                                                                <span class="icon google-plus"><img src="{{ asset('images/google_plus.png') }}" alt=""></span>
                                                                <span class="icon facebook"><img src="{{ asset('images/face.png') }}" alt=""></span>
                                                                <span class="icon slack"><img src="{{ asset('images/slack.png') }}" alt=""></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content-describe-course describe-mentor">
                                                        <p>{{ $teacher->desc }}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-href">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="row custom-course-row margin-bottom-row">
                        <div class="col">
                            <div class="wrapp-content description d-block">
                                <div class="text-describe-course custom-font-bold">
                                    Descriptions course
                                 </div>
                                 <div class="content-describe-course">
                                     <p>{{ $course->intro }}</p>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="row custom-course-row margin-bottom-row row-info">
                        <div class="col">
                            <div class="wrapp-content d-block ">
                                <div class="learner-number data-course">
                                    <span class="icon">
                                        <i class="fas fa-users"></i> Learners
                                    </span>
                                    <span class="info-data">
                                        : {{ $course->learner_number }}
                                    </span>
                                </div>
                                <div class="lesson-number data-course">
                                    <span class="icon">
                                        <i class="fas fa-list-alt"></i> Lessons
                                    </span>
                                    <span class="info-data">
                                        : {{ $course->lesson_number }}
                                    </span>
                                </div>
                                <div class="time-learning data-course">
                                    <span class="icon">
                                        <i class="far fa-clock"></i> Times
                                    </span>
                                    <span class="info-data">
                                        : {{ $course->time_learning }} hours
                                    </span>
                                </div>
                                <div class="tags data-course">
                                    <span class="icon">
                                        <i class="fas fa-tags"></i> Tags
                                    </span>
                                    <span class="info-data color-tags">
                                        : 
                                        @foreach ($course->tags as $tag)
                                            @if ($loop->last)
                                                #{{ $tag->name }}
                                            @else
                                                #{{ $tag->name }}, 
                                            @endif    
                                        @endforeach
                                    </span>
                                </div>
                                <div class="price data-course">
                                    <span class="icon">
                                        <i class="far fa-money-bill-alt"></i> Price
                                    </span>
                                    <span class="info-data" data-value = "{{ number_format($course->price) }}">
                                        :&ensp; {{ ($course->price > 0) ? number_format($course->price).'$' : 'Free' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row custom-course-row margin-bottom-row row-info">
                        <div class="col">
                            <div class="wrapp-content d-block ">
                                <span class="text-other-course d-block">
                                    Other Courses
                                </span>
                                <div class="col list-lessons">
                                    <?php $i = 1 ?>
                                    @foreach ($other_course as $row)
                                    <div class="item-lesson other-courses">
                                        <div class="number text-center">
                                            {{ $i }}.
                                        </div>
                                        <div class="desc-lesson">
                                            &ensp;<a href="{{ route('course.detail', ['id' => $row->id]) }}"> {{ $row->name }}</a>
                                        </div>
                                    </div>
                                    <?php $i = $i + 1 ?>
                                    @endforeach
                                    
                                    <div class="get-this-course text-center view-all">
                                        <a href="{{ route('allcourse') }}" class="btn link-course">View all ours courses</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
