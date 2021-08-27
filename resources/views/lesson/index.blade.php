@extends('master')

@section('content')
    <div class="allcourse">
        <div class="container path">
            Home > All courses > Course detail > Lesson detail
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
                                        <a id="descriptions-href" class="nav-link active" data-toggle="tab" role="tab"  href="#descriptions">Descriptions</a>
                                    </li>
                                    <li class="nav-item col tab-item">
                                        <a id="teacher-href" class="nav-link" data-toggle="tab" role="tab"  href="#teacher">Teachers</a>
                                    </li>
                                    <li class="nav-item col tab-item">
                                        <a id="documents-href" class="nav-link" data-toggle="tab" role="tab"  href="#documents">Documents</a>
                                    </li>
                                    <li class="nav-item col tab-item">
                                        <a id="review-href" class="nav-link" data-toggle="tab" role="tab"  href="#review">Reviews</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="descriptions" role="tabpanel" aria-labelledby="descriptions-href">
                                        <div class="custom-course-row main-teacher">
                                            <div class="text-describe-course custom-font-bold">
                                                Descriptions lesson
                                            </div>
                                            <div class="content-describe-course describe-mentor">
                                                <p>{{ $lesson->desc }}</p>
                                            </div>
                                            <div class="text-describe-course custom-font-bold">
                                                Requirements
                                            </div>
                                            <div class="content-describe-course describe-mentor">
                                                <p>{{ $lesson->desc }}</p>
                                            </div>

                                            <div class="tags tags-list">
                                                Tag : 
                                                @foreach ($lesson->course->tags as $tag)
                                                    <span class="tag-item">#{{ $tag->name }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-href">
                                        <div class="custom-course-row main-teacher">
                                            <div class="text-describe-course custom-font-bold">
                                                Main Teachers
                                            </div>

                                            <div class="list-mentor">
                                                @foreach ($lesson->course->teachers as $teacher)
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
                                    <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-href">
                                        <div class="custom-course-row main-teacher">
                                            <div class="text-describe-course custom-font-bold">
                                                Program
                                            </div>

                                            <div class="list-lessons list-documents" id="list-lessons" data-check="{{ $result }}">    
                                                <div class="item-lesson item-documents">
                                                    <div class="number text-center"> <img src="{{ asset('images/docs.png') }}" alt="Card image cap" class="mx-2"> Lesson</div>
                                                    <div class="desc-lesson custom-font-bold">
                                                        <a href="#" class="mx-3"> Program learn HTML/CSS </a>
                                                    </div>
                                                    <div class="text-right link-lesson">
                                                        <a href="/home/course/' + course_id + '/lesson/' + lessonData.id + '" class="btn link-course">Preview</a>
                                                    </div>
                                                </div>     
                                                <div class="item-lesson item-documents">
                                                    <div class="number text-center"> <img src="{{ asset('images/pdf.png') }}" alt="Card image cap" class="mx-2"> pdf</div>
                                                    <div class="desc-lesson custom-font-bold">
                                                        <a href="#" class="mx-3"> Download course slides </a>
                                                    </div>
                                                    <div class="text-right link-lesson">
                                                        <a href="/home/course/' + course_id + '/lesson/' + lessonData.id + '" class="btn link-course">Preview</a>
                                                    </div>
                                                </div>          
                                                <div class="item-lesson item-documents">
                                                    <div class="number text-center"> <img src="{{ asset('images/video.png') }}" alt="Card image cap" class="mx-2"> video</div>
                                                    <div class="desc-lesson custom-font-bold">
                                                        <a href="#" class="mx-3"> Download course video </a>
                                                    </div>
                                                    <div class="text-right link-lesson">
                                                        <a href="/home/course/' + course_id + '/lesson/' + lessonData.id + '" class="btn link-course">Preview</a>
                                                    </div>
                                                </div>                           
                                            </div>

                                            <form action="{{ route('lesson.upfile') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $lesson->id }}">
                                                <input type="file" id="document" name="document" />
                                                <button type="submit">upload</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-href">
                                        <div class="custom-course-row main-teacher pb-5">
                                            <div class="text-describe-course custom-font-bold" id="numberReview"></div>
                                            <div class="rating row">
                                                <div class="total-rating col-12 col-lg-5">
                                                    <div class="rate rate-course">
                                                        <div class="rate-course-number text-center">
                                                            <span class="number-rate custom-font-bold">{{  number_format($lesson->course->rate, 1) }}</span>
                                                            <div class="star" data-rate="{{  ceil($lesson->course->rate) }}">
                                                                <span><i class="fas fa-star"></i></span>
                                                                <span><i class="fas fa-star"></i></span>
                                                                <span><i class="fas fa-star"></i></span>
                                                                <span><i class="fas fa-star"></i></span>
                                                                <span><i class="fas fa-star"></i></span>
                                                            </div>
                                                            <span class="number-vote" id="number-vote"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-detail custom-course-row col-12 col-lg-7">
                                                    <div class="item-lesson other-courses item-rate">
                                                        <div class="number text-center"> 5 star </div>
                                                        <span class="bar"></span>
                                                        <div class="number text-center vote-number"> 1 </div>
                                                    </div>
                                                    <div class="item-lesson other-courses item-rate">
                                                        <div class="number text-center"> 4 star </div>
                                                        <span class="bar"></span>
                                                        <div class="number text-center vote-number"> 1 </div>
                                                    </div>
                                                    <div class="item-lesson other-courses item-rate">
                                                        <div class="number text-center"> 3 star </div>
                                                        <span class="bar"></span>
                                                        <div class="number text-center vote-number"> 1 </div>
                                                    </div>
                                                    <div class="item-lesson other-courses item-rate">
                                                        <div class="number text-center"> 2 star </div>
                                                        <span class="bar"></span>
                                                        <div class="number text-center vote-number"> 1 </div>
                                                    </div>
                                                    <div class="item-lesson other-courses item-rate">
                                                        <div class="number text-center"> 1 star </div>
                                                        <span class="bar"></span>
                                                        <div class="number text-center vote-number"> 1 </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-mentor" id="listReviews">
                                            </div>
                                            <div class="text-describe-course custom-font-bold leave-review">
                                                Leave a Review
                                            </div>

                                            <div class="m-3">
                                                <div class="message-add-review my-3">Message</div>
                                                <input type="hidden" name="rating_value" class="rating_value">
                                                <input type="hidden" name="course_id" value="{{ $lesson->course->id }}">
                                                <textarea name="content" id="content" cols="30" rows="5" class="form-control mb-3"></textarea>
                                                <div class="vote-star-review d-flex align-items-center">
                                                    <div class="add-review custom-font-bold">vote : </div>
                                                    <div class="vote">
                                                        <input type="radio" id="star-five" name="vote" class="vote-option" value="{{ config('variable.rate.five_star') }}"/>
                                                        <label for="star-five" title="text">5 stars</label>
                                                        <input type="radio" id="star-four" name="vote" class="vote-option" value="{{ config('variable.rate.four_star') }}"/>
                                                        <label for="star-four" title="text">4 stars</label>
                                                        <input type="radio" id="star-three" name="vote" class="vote-option" value="{{ config('variable.rate.three_star') }}" />
                                                        <label for="star-three" title="text">3 stars</label>
                                                        <input type="radio" id="star-two" name="vote" class="vote-option" value="{{ config('variable.rate.two_star') }}" />
                                                        <label for="star-two" title="text">2 stars</label>
                                                        <input type="radio" id="star-one" name="vote" class="vote-option" value="{{ config('variable.rate.one_star') }}" />
                                                        <label for="star-one" title="text">1 star</label>
                                                    </div>
                                                    <div class="message-add-review">( stars)</div>
                                                </div>
                                                <div class="link-lesson">
                                                    <a href="#" class="btn link-course" id="send">Send</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="row custom-course-row margin-bottom-row row-info">
                        <div class="col">
                            <div class="wrapp-content d-block ">
                                <div class="lesson-number data-course">
                                    <span class="icon">
                                        <i class="fas fa-desktop"></i> Course
                                    </span>
                                    <span class="info-data">
                                        : {{ $lesson->course->name }}
                                    </span>
                                </div>
                                <div class="learner-number data-course">
                                    <span class="icon">
                                        <i class="fas fa-users"></i> Learners
                                    </span>
                                    <span class="info-data">
                                        : {{ $lesson->course->learner_number }}
                                    </span>
                                </div>
                                <div class="time-learning data-course">
                                    <span class="icon">
                                        <i class="far fa-clock"></i> Times
                                    </span>
                                    <span class="info-data">
                                        : {{ $lesson->course->time_learning }} hours
                                    </span>
                                </div>
                                <div class="tags data-course">
                                    <span class="icon">
                                        <i class="fas fa-tags"></i> Tags
                                    </span>
                                    <span class="info-data color-tags">
                                        :
                                        @foreach ($lesson->course->tags as $tag)
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
                                    <span class="info-data" data-value = "{{ number_format($lesson->course->price) }}">
                                        :&ensp; {{ ($lesson->course->price > 0) ? number_format($lesson->course->price).'$' : 'Free' }}
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
