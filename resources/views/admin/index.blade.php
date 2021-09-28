<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">   
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/owl.png') }}" >
        <title>HapoLearn</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid p-0 d-flex">
                <div class="logo-admin bg-dark">
                    <a class="navbar-brand"><img class="" src="{{ asset('images/owl_mess.png') }}" alt=""> HapoLearn</a>
                </div>
                <div class="bar px-4 d-flex align-items-center">
                    <a class="navbar-brand"><i class="fas fa-bars"></i></a>
                    <ul class="d-flex justify-content-end align-items-center w-100 m-0">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main d-flex">
                <div class="menu-admin bg-dark">
                    <div class="name d-flex align-items-center">
                        <img src="{{ asset('images/owl_mess.png') }}" alt="">
                        <span class="mx-2">Hao</span>
                    </div>
                    <ul class="w-100 m-0 p-0">
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="#">Features <i class="fas fa-caret-down float-right my-1"></i></a>

                            <ul class="w-100 m-0 p-0 submenu">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><i class="far fa-circle nav-icon"></i> Home</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features <i class="fas fa-caret-down float-right my-1"></i></a>
  
                              <ul class="w-100 m-0 p-0 submenu">
                                  <li class="nav-item">
                                  <a class="nav-link" aria-current="page" href="#"><i class="far fa-circle nav-icon"></i> Home</a>
                                  </li>
                              </ul>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>

                @yield('content')
                
            </div>
        </div>
        @if (!@Auth::check())
            @include('layouts.modallogin')
        @endif

       
        <script src="{{ asset('js/app.js') }}"></script>
        @include('sweetalert::alert')
    </body>

</html>
