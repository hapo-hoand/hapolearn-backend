@extends('master')

@section('content')
<div class="allcourse">
    <div class="container">
        <div class="profile row" style="padding: 50px 0">
            <div class="col-12 col-sm-4">
                <ul class="navbar-nav menu align-items-center">
                    <li class="nav-item w-100 text-center">
                        <div class="detail d-block avatar">
                            <div class="position-relative">
                                <img class="mb-2" src="{{ asset('images/'.Auth()->user()->avatar) }}" alt="">
                                <label for="photo" class="photo"><i class="fas fa-camera"></i></label>
                                <input id="photo" type="file" name="photo" class="d-none">
                                @include('user._preview_avatar')
                            </div>
                            <span class="name d-block custom-font-bold">{{ Auth()->user()->name }}</span>
                            <span class="gmail d-block">{{ Auth()->user()->email }}</span>
                        </div>
                    </li>
                    <li class="nav-item w-100">
                        <div class="detail"><i class="fas fa-birthday-cake birthday"></i> <span>{{ Auth()->user()->birthday }}</span> </div>
                    </li>
                    <li class="nav-item w-100">
                        <div class="detail"> <i class="fas fa-phone phone"></i> <span>{{ Auth()->user()->phone }}</span> </div>
                    </li>
                    <li class="nav-item w-100">
                        <div class="detail"> <i class="fas fa-home address"></i><span>{{ Auth()->user()->address }}</span> </div>
                    </li>
                    <li class="nav-item w-100">
                        <div class="desc">{{ Auth()->user()->desc }}</div>
                    </li>
            </div>
            <div class="col-12 col-sm-8">
                <div style="margin-top: 150px">
                    <div class="title">
                        <div class="custom-font-bold">My courses</div>
                    </div>
                    <div class="list-course-joined">
                        @foreach ($courses as $course)
                            <span class="item-course">
                                <a href="{{ route('course.detail', ['id' => $course->id]) }}"><img src="{{ asset('images/'.$course->image) }}" alt=""></a>
                                <p>{{ $course->name }}</p>
                            </span>
                        @endforeach
                    </div>
                    <div class="title">
                        <div class="custom-font-bold">Edit profile</div>
                    </div>
                    <form class="edit-profile" method="POST" action="{{ Route('user.update') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="username" class="form-label custom-label font-weight-bold">Name:</label>
                                <input type="text" class="form-control custom-input-text" id="username" placeholder="Name..." name="username">
                            </div>
                            <div class="form-group col-6">
                                <label for="password" class="form-label custom-label font-weight-bold">Email:</label>
                                <input type="email" class="form-control custom-input-text"  placeholder="Email..." id="email" name="email">
                            </div>
                            <div class="form-group col-6">
                                <label for="birthday" class="form-label custom-label font-weight-bold">Date of birthday:</label>
                                <input type="datetime-local" class="form-control custom-input-text"  id="birthday" name="birthday">
                            </div>
                            <div class="form-group col-6">
                                <label for="phone" class="form-label custom-label font-weight-bold">Phone:</label>
                                <input type="text" class="form-control custom-input-text"  placeholder="Phone..." id="phone" name="phone">
                            </div>
                            <div class="form-group col-6">
                                <label for="address" class="form-label custom-label font-weight-bold">Address:</label>
                                <input type="text" class="form-control custom-input-text"  placeholder="Address..." id="address" name="address">
                            </div>
                            <div class="form-group col-6">
                                <label for="desc" class="form-label custom-label font-weight-bold">About me:</label>
                                <textarea name="desc" id="desc" rows="5" placeholder="About me..." class="form-control"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
