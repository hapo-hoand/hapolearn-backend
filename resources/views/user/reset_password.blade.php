@extends('master')

@section('content')
<div class="allcourse padding-70">
    <div class="container">
        <div class="reset">
            <div class="form-reset">
                <form class="edit login-content" action="{{ route('confirm.reset') }}" method="post">
                    @csrf
                    <p class="text-center title custom-font-bold">Reset Password</p>
                    <p class="text-center text">Enter email to reset your password</p>
                    <div class="form-group">
                        <label for="email" class="form-label custom-label font-weight-bold">Email:</label>
                        <input type="text" class="form-control custom-input-text" value="{{ $email }}" readonly id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="reset-pass" class="form-label custom-label font-weight-bold">Password:</label>
                        <input type="password" class="form-control custom-input-text @error('reset_password') is-invalid @enderror" id="resetPassword" name="reset_password">
                        <label class="text-danger form-label custom-label font-weight-bold">
                            @error('reset_password')
                                {{ $message }}
                            @enderror
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="resetrepeatpass" class="form-label custom-label font-weight-bold">Repeat Password:</label>
                        <input type="password" class="form-control custom-input-text @error('reset_repeatpassword') is-invalid @enderror" id="resetRepeatpass" name="reset_repeatpassword">
                        <label class="text-danger form-label custom-label font-weight-bold">
                            @error('reset_repeatpassword')
                            {{ $message }}
                            @enderror
                        </label>
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