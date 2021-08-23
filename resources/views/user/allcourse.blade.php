@extends('user.master')

@section('content')
    <div class="allcourse">
        <div class="container">
            <form action="{{ route('search') }}" method="get" name="advance_search">
                <div class="search d-flex justify-content-center justify-content-sm-start">
                    <button type="button" class="btn btn-filter collapsed" id="btnFilter" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter"><i class="fas fa-sliders-h"></i> Filter </button>
                    <div class="input-group md-form form-sm form-1 input-group-search">
                        <input class="form-control my-0 py-1 input-text" name="key" value="{{ request("key") }}" type="text" placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <span class="input-group-text btn btn-search-icon" id="basic-text1"><i class="fas fa-search text-black"
                                aria-="true"></i>
                            </span>
                        </div>
                    </div>
                    <button class="btn btn-filter mx-3 btn-search" type="submit"  id="btnSearch"> Search </button>
                </div>

                <div class="collapse collapse-filter show" id="collapseFilter">
                    <div class="filter bg-white p-2">
                        <div class="text">
                            <p class="text-filter">Filter</p>
                        </div>
                        <div class="option">
                            <div class="d-block">
                                <div class="form-group form-filter">
                                    <input type="radio" name="status" checked class="status" value={{ config('variable.status.lastest') }}  id="oldStatus" {{ request('status') == config('variable.status.lastest') ? 'checked' : config('variable.status.null') }}/>
                                    <label for="oldStatus" class="form-label custom-label label-filter-custom"> Lastest </label>
                                </div>
                                <div class="form-group form-filter">
                                    <input type="radio" name="status" class="status" value={{ config('variable.status.oldest') }}  id="newStatus" {{ request('status') == config('variable.status.oldest') ? 'checked' : config('variable.status.null') }}/>
                                    <label for="newStatus" class="form-label custom-label label-filter-custom"> Oldest </label>
                                </div>
                                <div class="form-group form-filter">
                                    <select name="teacher" class="custom-select" id="teacher">
                                        <option value={{ config('variable.null') }} > Teacher </option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ request("teacher") == $teacher->id  ? "selected" : config('variable.null') }} >{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group form-filter">
                                    <select name="number_learner" class="custom-select" id="numberLerner">
                                        <option value="" {{ request("number_learner") ? '' : 'selected'   }} > Number of learner </option>
                                        <option value="{{ config('variable.orderBy.asc') }}" {{ request("number_learner") == config('variable.orderBy.asc')  ? "selected" : '' }}>Ascending</option>
                                        <option value="{{ config('variable.orderBy.desc') }}"  {{ request("number_learner") == config('variable.orderBy.desc')  ? "selected" : '' }}>Descending</option>
                                    </select>
                                </div>
                                <div class="form-group form-filter">
                                    <select name="time_learning" class="custom-select" id="timeLearning">
                                        <option value="" {{ request("time_learning") ? 'selected' : ''  }} > Study time </option>
                                        <option value="{{ config('variable.orderBy.asc') }}"  {{ request("time_learning") == config('variable.orderBy.asc')  ? "selected" : "" }}>Ascending</option>
                                        <option value="{{ config('variable.orderBy.desc') }}"  {{ request("time_learning") == config('variable.orderBy.desc')  ? "selected" : "" }}>Descending</option>
                                    </select>
                                </div>
                                <div class="form-group form-filter">
                                    <select name="number_lesson" class="custom-select" id="numberLesson">
                                        <option value={{ request("number_lesson") ? "selected" : '' }}> Number of lessons </option>
                                        <option value={{ config('variable.orderBy.asc') }} {{ request("number_lesson") == config('variable.orderBy.asc')  ? "selected" : "" }}>Ascending</option>
                                        <option value={{ config('variable.orderBy.desc') }} {{ request("number_lesson") == config('variable.orderBy.desc')  ? "selected" : "" }}>Descending</option>
                                    </select>
                                </div>
                                <div class="form-group form-filter">
                                    <select name="tags" class="custom-select" id="tags">
                                        <option value=> Tags </option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ request("tags") == $tag->id  ? "selected" : '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-filter">
                                    <select name="reviews" class="custom-select" id="reviews">
                                        <option value={{ request("reviews") ? "selected" : '' }}> Reviews </option>
                                        <option value={{ config('variable.orderBy.asc') }}  {{ request("reviews") == config('variable.orderBy.asc')  ? "selected" : "" }}>Ascending</option>
                                        <option value={{ config('variable.orderBy.desc') }}  {{ request("reviews") == config('variable.orderBy.desc')  ? "selected" : "" }}>Descending</option>
                                    </select>
                                </div>
                                <button type="button" class="btn mx-3 btn-clear btn-danger" id="btnClear"> Clear </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row list-course margin-top">

                @foreach ($courses as $course)

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

                @endforeach
            </div>
            {{ $courses->links('user.layouts.pagination') }}
        </div>
    </div>
@endsection
