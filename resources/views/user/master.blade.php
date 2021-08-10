<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">   
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/owl.png') }}" >
        <title>HapoLearn</title>
        @yield('css');
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid p-0">
                <div class="header">
                    <nav class="navbar navbar-expand-sm navbar-light bg-white">
                        <div class="row align-items-center justify-content-center w-100 m-0 py-md-3">
                            <div class="col-lg-4 col-md-12 text-center text-lg-left col-sm-12 col-12">
                                <button class="navbar-toggler btn-menu" type="button" data-toggle="collapse"
                                    data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="my-1 mx-2 close fa fa-times"></span>
                                </button>
                                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo_hapolearn.png') }}" class="img-fluid" alt="hapo"></a>
                            </div>
                            <div class="col-lg-8 col-md-12 text-center col-sm-12 col-12">
                                <div class="collapse custom-menu navbar-collapse justify-content-lg-end justify-content-md-center p-md-2"
                                    id="navbarNavDropdown">
                                    <ul class="navbar-nav menu">
                                        <li class="nav-item">
                                            <a class="nav-link item-menu item-active" href="#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link item-menu" href="#">All Course</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link item-menu" href="#">Profile</a>
                                        </li>

                                        @if (empty($user))
                                            <li class="nav-item">
                                                <a class="nav-link item-menu" id="login" href="#">Login/Register</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link item-menu" id="logout" href="#"><img src="{{ asset('images/ $user->avatar') }}" alt=""> </a>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                @yield('content');

                <div class="footer">
                    <div class="content-footer">
                        <div class="row w-100">
                            <div class="col-12 col-md-4 col-data p-sm-0">
                                <div class="text">
                                    <div class="row m-0">
                                        <div class="col-6 pl-4 pr-sm-0 pb-3">
                                            <a href="#"><p>Home</p></a>
                                            <a href="#"><p>Features</p></a>
                                            <a href="#"><p>Courses</p></a>
                                            <a href="#"><p>Blog</p></a>
                                        </div>
                                        <div class="col-6 pl-4 pr-sm-0 pb-3">
                                            <a href="#"><p>Contact</p></a>
                                            <a href="#"><p>Terms of Use</p></a>
                                            <a href="#"><p>FAQ</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 col-md-4 col-logo pl-4 pr-sm-0 p-lg-0">
                                <img src="{{ asset('images/logo_hapolearn_white.png') }}" alt="img">
                                <p>Interactive lessons, "on-the-go" <br> practice, peer support.</p>
                            </div>
                            <div class="col-5 col-md-4 col-contact pr-4 p-sm-0">
                                <div class="icon">
                                    <div class="contact-item">
                                        <div class="background-item">
                                            <a href="https://www.facebook.com/DangHoa221100">
                                            <span class="btn btn-secondary example-popover icon-face" data-container="body" data-toggle="popover" data-placement="bottom" data-content="https://www.facebook.com/profile.php?id=100031950074031"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="background-item text-center">
                                            <span class="btn btn-secondary example-popover icon-phone" data-container="body" data-toggle="popover" data-placement="bottom" data-content="+84-85-645-9898"></span>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="background-item text-center">
                                            <span class="btn btn-secondary example-popover icon-mail" data-container="body" data-toggle="popover" data-placement="bottom" data-content="hoand@haposoft.com"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="end">
                    © 2020 HapoLearn, Inc. All rights reserved.
                </div>
            </div>
        </div>

        @if (empty($user))
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
        @endif

        <div class="messenger">
            <img src="{{ asset('images/mess.png') }}" alt="img">
        </div>
        <div class="wrap-mess">
            <span class="close-mess fa fa-times"></span>
            <div class="content-mess user-left">
                <div class="image">
                    <img src="{{ asset('images/owl_mess.png') }}" alt="img">
                </div>
                <div class="detail">
                    <small>HapoLearn</small>
                    <span>
                        HapoLearn xin chào bạn. <br> Bạn có cần chúng tôi hỗ trợ gì không?
                    </span>
                </div>
            </div>
            <div class="login-mess">
                <div class="login-accout login-with-google text-center btn-login-mess">
                    <i class="fab fa-facebook-messenger"></i>
                    <span>Đăng nhập vào Messenger</span>  
                </div>
                <small>Chat với HapoLearn trong Messenger</small>
            </div>
        </div>
         
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

        @yield('js');

    </body>
    
</html>