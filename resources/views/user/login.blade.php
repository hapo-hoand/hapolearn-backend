@extends('user.master')

@section('css')
@endsection

@section('content')
    <div class="modal fade show" id="modal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form class="login-content">
                            <div class="form-group">
                            <label for="username" class="form-label custom-label font-weight-bold">User Name:</label>
                            <input type="text" class="form-control custom-input-text" id="username" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                            <label for="password" class="form-label custom-label font-weight-bold">Password:</label>
                            <input type="password" class="form-control custom-input-text" id="password">
                            </div>
                            <div class="form-group row">
                                <div class="col-6 remenber pr-0">
                                    <input type="checkbox" id="remenber-me" class="custom-checkbox">
                                    <label class="form-check-label font-weight-bold" for="remenber-me">Remenber me</label>
                                </div>
                                <div class="col-6 forgot pl-0">
                                    <label class="font-weight-bold"><a href="#">Forgot password</a></span>
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
                        <form class="register-content">
                            <div class="form-group">
                                <label for="register-username" class="form-label custom-label font-weight-bold">User Name:</label>
                                <input type="text" class="form-control custom-input-text" id="register-username" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="register-email" class="form-label custom-label font-weight-bold">Email:</label>
                                <input type="email" class="form-control custom-input-text" id="register-email">
                            </div>
                            <div class="form-group">
                                <label for="register-pass" class="form-label custom-label font-weight-bold">Password:</label>
                                <input type="password" class="form-control custom-input-text" id="register-pass">
                            </div>
                            <div class="form-group">
                                <label for="register-repeatpass" class="form-label custom-label font-weight-bold">Repeat Password:</label>
                                <input type="password" class="form-control custom-input-text" id="register-repeatpass">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn-login">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection