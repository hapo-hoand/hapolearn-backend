<div class="col-12 col-sm-6 col-courses col-lessons">
    <div class="card custom-card">
        <div class="logo">
            <div class="row">
                <div class="col-3 px-1 px-sm-3">
                    <img src="{{ asset('images/acourse_machine_learning.png') }}" alt="" class="img-lesson">
                </div>
                <div class="col-9 text-left desc">
                    <p class="font-weight-bold title">{{ $course->name }}</p>
                    <p class="detail">{{ $course->intro }}</p>
                </div>
            </div>
            <div class="rate">
                <div class="star" data-rate="{{  ceil($course->rate) }}">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
                <a href="#" class="btn link-course link-lesson">More</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="row content-statistic info-course desc">
                <div class="col-sm-4 col-4">
                    <span class="title">{{__('Lessons') }}</span>
                    <span class="number"> {{ number_format($course->lesson_number) }} </span>
                </div>
                <div class="col-sm-4 col-4">
                    <span class="title">{{__('Learners') }}</span>
                    <span class="number">{{ number_format(  $course->learner_number) }} </span>
                </div>
                <div class="col-sm-4 col-4">
                    <span class="title">{{__('Time') }}</span>
                    <span class="number">{{ $course->time_learning }} (h) </span>
                </div>
            </div>
        </div>
    </div>
</div>
