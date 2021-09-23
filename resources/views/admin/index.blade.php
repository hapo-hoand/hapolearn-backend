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
            <div class="container-fluid p-0">
                <div class="menu">
                    <a href="#" class="brand-link">
                        <img src="./Public/Interface/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                             style="opacity: .8">
                        <span class="brand-text font-weight-light">AdminLTE 3</span>
                    </a>
                    <div class="collapse collapse-horizontal" id="collapseWidthExample">
                        <div class="card card-body" style="width: 300px;">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Features</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Pricing</a>
                                </li>
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="top-bar">

                </div>
                <div class="content">

                </div>
                <div class="footer">

                </div>
            </div>
        </div>
       
        <script src="{{ asset('js/app.js') }}"></script>
        @include('sweetalert::alert')
    </body>

</html>
