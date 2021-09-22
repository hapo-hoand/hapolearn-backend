<div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal">
        <div class="modal-content">
            <span class="fa fa-times close-modal"></span>
            <ul class="nav nav-tabs row tab-list" id="example-tabs" role="tablist">
                <li class="nav-item col-6 tab-item">
                    <a id="login-href" class="nav-link active" data-toggle="tab" role="tab"  href="#login-accout">Login</a>
                </li>
                <li class="nav-item col-6 tab-item">
                    <a id="register-href" class="nav-link" data-toggle="tab" role="tab"  href="#register-accout">Register</a>
                </li>
            </ul>
              
            <div class="tab-content">
                <div class="tab-pane fade show active" id="login-accout" role="tabpanel" aria-labelledby="login-href">
                    <form class="login-content" method="POST" action="{{ Route('account.signin') }}">
                        @csrf
                        <input type="hidden" id="checksignin" class="@if (\Session::has('Error')) ? error : '' @endif ">
                        <div class="form-group">
                            <label for="username" class="form-label custom-label font-weight-bold">User Name:</label>
                            <input type="text" class="form-control custom-input-text @error('username') is-invalid @enderror" id="username" name="username" aria-describedby="emailHelp">
                            <label class="text-danger form-label custom-label font-weight-bold">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label custom-label font-weight-bold">Password:</label>
                            <input type="password" class="form-control custom-input-text @error('password') is-invalid @enderror" id="password" name="password">
                            <label class="text-danger form-label custom-label font-weight-bold">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 remenber pr-0">
                                <input type="checkbox" id="remenber-me" class="custom-checkbox" name="remenber_me">
                                <label class="form-check-label font-weight-bold" for="remenber-me">Remenber me</label>
                            </div>
                            <div class="col-6 forgot pl-0">
                                <label class="font-weight-bold"><a href="{{ route('reset.password') }}">Forgot password</a></span>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn-login">LOGIN</button>
                        </div >
                        <div class="integrated-login font-weight-bold">Login with</div>
                        <div class="my-3 login-accout login-with-google text-center">
                            <i class="fab fa-google-plus-g icon-login"></i>
                            <span>Google</span>  
                        </div>
                        <div class="my-3 login-accout login-with-facebook text-center ">
                            <i class="fab fa-facebook-f icon-login"></i>
                            <span>Facebook</span>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="register-accout" role="tabpanel" aria-labelledby="register-href">
                    <form class="register-content" method="POST" action="{{ Route('account.store') }}">
                        @csrf
                            <div class="form-group">
                                <label for="register-username" class="form-label custom-label font-weight-bold">User Name:</label>
                                <input type="text" class="form-control custom-input-text @error('register_username') is-invalid @enderror" id="registerUsername" name="register_username" aria-describedby="emailHelp">
                                <label class="text-danger form-label custom-label font-weight-bold">
                                    @error('register_username')
                                        {{ $message }}
                                    @enderror
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="register-email" class="form-label custom-label font-weight-bold">Email:</label>
                                <input type="email" class="form-control custom-input-text @error('register_email') is-invalid @enderror" id="registerEmail" name="register_email">
                                <label class="text-danger form-label custom-label font-weight-bold">
                                    @error('register_email')
                                        {{ $message }}
                                    @enderror
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="register-pass" class="form-label custom-label font-weight-bold">Password:</label>
                                <input type="password" class="form-control custom-input-text @error('register_password') is-invalid @enderror" id="registerPassword" name="register_password">
                                <label class="text-danger form-label custom-label font-weight-bold">
                                    @error('register_password')
                                        {{ $message }}
                                    @enderror
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="registerrepeatpass" class="form-label custom-label font-weight-bold">Repeat Password:</label>
                                <input type="password" class="form-control custom-input-text @error('register_repeatpassword') is-invalid @enderror" id="registerRepeatpass" name="register_repeatpassword">
                                <label class="text-danger form-label custom-label font-weight-bold">
                                    @error('register_repeatpassword')
                                    {{ $message }}
                                    @enderror
                                </label>
                            </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn-login register">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
