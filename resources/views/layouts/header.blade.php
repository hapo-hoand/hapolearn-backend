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
                <div class="collapse custom-menu navbar-collapse justify-content-lg-end justify-content-sm-center p-md-2"
                    id="navbarNavDropdown">
                    <ul class="navbar-nav menu align-items-center">
                        <li class="nav-item">
                            <a class="nav-link item-menu {{ Route::currentRouteName() == 'home' ? 'item-active' : '' }} " href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link item-menu {{ Route::currentRouteName() == 'allcourse' ? 'item-active' : '' }}" href="{{ route('allcourse') }}">All Course</a>
                        </li>
                        @if (!@Auth::check())
                            <li class="nav-item">
                                <a class="nav-link item-menu" id="login" href="{{ route('account.signin') }}">Login/Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link item-menu {{ Route::currentRouteName() == 'profile' ? 'item-active' : '' }}" href="/profile">Profile</a>
                            </li>
                            <li class="nav-item dropdown" id="dropdownMenuButton" data-toggle="dropdown">
                                <img src="{{ asset('images/'.Auth()->user()->avatar) }}" alt="">
                                <i class="fas fa-sort-down"></i>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" id="logout" href="{{ route('account.signout') }}">Logout</a>
                                </div>
                            </li>
                            <li class="nav-item">
                             
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
