@extends('master')

@section('content')
<div class="allcourse padding-70">
    <div class="container">
        <div class="reset">
            <div class="form-reset">
                <form class="edit login-content" action="{{ route('sendmail') }}" method="post">
                    @csrf
                    <p class="text-center title custom-font-bold">Reset Password</p>
                    <p class="text-center text">Enter email to reset your password</p>
                    @if (\Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="email" class="form-label custom-label font-weight-bold">Email:</label>
                        <input type="text" class="form-control custom-input-text" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn-login btn-reset" id="btn-reset-password">RESET PASSWORD</button>
                    </div >
                </form>
            </div>
        </div>
    </div>
</div>
@endsection