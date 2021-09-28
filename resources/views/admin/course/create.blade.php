@extends('admin.index')

@section('content')
<div class="content-main">
    <div class="px-4">
        <h1>Course</h1>
        <form class="edit-profile" method="POST" action="{{ Route('user.update') }}">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="username" class="form-label custom-label font-weight-bold">Image: <img src="{{ asset('images/slack.png') }}" alt=""></label>
                    <div class="d-flex align-items-center info-user">
                        <input type="file" class="form-control custom-input-text input-profile" id="username" placeholder="Name..." name="username">
                        <i class="mx-2 fas fa-edit edit-icon"></i>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="username" class="form-label custom-label font-weight-bold">Name:</label>
                    <div class="d-flex align-items-center info-user">
                        <input type="text" class="form-control custom-input-text input-profile" id="username" placeholder="Name..." name="username">
                        <i class="mx-2 fas fa-edit edit-icon"></i>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="password" class="form-label custom-label font-weight-bold">Email:</label>
                    <div class="d-flex align-items-center info-user">
                        <input type="email" class="form-control input-profile custom-input-text @error('email') is-invalid @enderror"  placeholder="Email..." id="email" name="email">
                        <i class="mx-2 fas fa-edit edit-icon"></i>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="birthday" class="form-label custom-label font-weight-bold">Date of birthday:</label>
                    <div class="d-flex align-items-center info-user">
                        <input type="date" class="form-control input-profile custom-input-text @error('birthday') is-invalid @enderror" id="birthday" name="birthday">
                        <i class="mx-2 fas fa-edit edit-icon"></i>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="phone" class="form-label custom-label font-weight-bold">Phone:</label>
                    <div class="d-flex align-items-center info-user">
                        <input type="text" class="form-control input-profile custom-input-text @error('phone') is-invalid @enderror"  placeholder="Phone..." id="phone" name="phone">
                        <i class="mx-2 fas fa-edit edit-icon"></i>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="address" class="form-label custom-label font-weight-bold">Address:</label>
                    <div class="d-flex align-items-center info-user">
                        <input type="text" class="form-control input-profile custom-input-text"  placeholder="Address..." id="address" name="address">
                        <i class="mx-2 fas fa-edit edit-icon"></i>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="desc" class="form-label custom-label font-weight-bold">About me:</label>
                    <div class="d-flex align-items-center info-user">
                        <textarea name="desc" id="desc" rows="5" placeholder="About me..." class="form-control input-profile"></textarea>
                        <i class="mx-2 fas fa-edit edit-icon"></i>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection