<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <link rel="stylesheet" href="{{ asset('css/app.css') }}">   
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/owl.png') }}" >
        <title>HapoLearn</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid p-0">
                @include('user.layouts.header')
               
                @yield('content')

                @include('user.layouts.footer')
            </div>
        </div>

        @if (!@Auth::check())
           @include('user.layouts.modallogin')
        @endif

        @include('user.layouts.chatbox')
       
        <script src="{{ asset('js/app.js') }}"></script>
        @include('sweetalert::alert')
    </body>

</html>
