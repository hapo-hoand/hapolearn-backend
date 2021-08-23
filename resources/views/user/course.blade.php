@extends('user.master')

@section('content')
    <div class="allcourse">
        <div class="container path">
            Home > All courses > Course detail
        </div>
    </div>
    <div class="course">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-sm-8 custom-col-padding ">
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
                            <div class="col-courses custom-col-course bg-white">
                                <ul class="nav nav-tabs row tab-list tab-course" id="example-tabs" role="tablist">
                                    <li class="nav-item col tab-item">
                                        <a id="lesson-href" class="nav-link active" data-toggle="tab" role="tab"  href="#lesson">Lesson</a>
                                    </li>
                                    <li class="nav-item col tab-item">
                                        <a id="teacher-href" class="nav-link" data-toggle="tab" role="tab"  href="#teacher">Teacher</a>
                                    </li>
                                    <li class="nav-item col tab-item">
                                        <a id="review-href" class="nav-link" data-toggle="tab" role="tab"  href="#review">Teacher</a>
                                    </li>
                                </ul>
                                  
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="lesson" role="tabpanel" aria-labelledby="lesson-href">
                                        <div class="search-lesson">
                                            <form action="#" method="get" name="advance_search">
                                                <div class="search d-flex justify-content-center justify-content-sm-start">
                                                    <div class="input-group input-group-search">
                                                        <input class="form-control input-text" name="key" value="{{ request("key") }}" type="text" placeholder="Search" aria-label="Search">
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
                                                <a href="#" class="btn link-course">Take This Course</a>
                                            </div>
                                        </div>
                                        <div class="list-lessons">
                                            <div class="item-lesson">
                                                <div class="number text-center">
                                                    1.
                                                </div>
                                                <div class="desc-lesson">
                                                 <a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                                </div>
                                                <div class="text-right link-lesson">
                                                    <a href="#" class="btn link-course">Learn</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-href">
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
                        <div class="col custom-col-padding ">
                            <div class="text-describe-course">
                                Descriptions course
                             </div>
                             <div class="content-describe-course">
                                 <p>Vivamus volutpat eros pulvinar velit laoreet, 
                                     sit amet egestas erat dignissim. Sed quis rutrum tellus, 
                                     sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. 
                                     Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. 
                                     Pellentesque tristique fringilla tempus. Vivamus
                                 </p>
                             </div>
                        </div>
                    </div>
                    <div class="row custom-course-row margin-bottom-row row-info">
                        <div class="col custom-col-padding ">
                            <div class="learner-number data-course">
                               <span class="icon">
                                <i class="fas fa-users"></i> Learners
                               </span>
                               <span class="info-data">
                                    :&emsp;{{ $course->learner_number }}
                               </span>
                            </div>
                            <div class="lesson-number data-course">
                                <span class="icon">
                                    <i class="fas fa-list-alt"></i> Lessons
                                </span>
                                <span class="info-data">
                                    :&emsp;{{ $course->lesson_number }}
                                </span>
                            </div>
                            <div class="time-learning data-course">
                                <span class="icon">
                                    <i class="far fa-clock"></i> Times
                                </span>
                                <span class="info-data">
                                    :&emsp; {{ $course->title }} hours
                                </span>
                            </div>
                            <div class="tags data-course">
                                <span class="icon">
                                    <i class="fas fa-tags"></i> Tags
                                </span>
                                <span class="info-data">
                                    :&emsp;500
                                </span>
                            </div>
                            <div class="price data-course">
                                <span class="icon">
                                    <i class="far fa-money-bill-alt"></i> Price
                                </span>
                                <span class="info-data">
                                    :&emsp;500
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row custom-course-row margin-bottom-row row-info">
                        <span class="text-other-course">
                            Other Courses
                        </span>
                        <div class="col custom-col-padding list-lessons">
                            <div class="item-lesson other-courses">
                                <div class="number text-center">
                                    1.&ensp;
                                </div>
                                <div class="desc-lesson">
                                    <a href=""> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                </div>
                            </div>

                            <div class="get-this-course text-center view-all">
                                <a href="#" class="btn link-course">View all ours courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
