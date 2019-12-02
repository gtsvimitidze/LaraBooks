<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles my -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- fa fa-icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <!-- load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
    {{-- moment.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/af.js"></script>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <nav class="navbar-expand-md navbar-dark bg-dark">

        <div class="container-fruit" style="padding: 5pt 20pt 5pt 20pt">
            <div class="row">
                <div class="col-2">
                    <a class="navbar-brand" href="{{ url('/books') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        {{-- <img src="{{asset('uploads/gorgia-logo.PNG')}}" style="height: 75pt"> --}}
                        <span class="header-logo">
                            <i class="fa fa-book" aria-hidden="true"></i><span style="padding-left: 5pt"></span> LaraBooks
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-5" style="color: white">
                    {{-- <a class="nav-link"><strong><i class="fa fa-tv" aria-hidden="true"></i> {{ getHostByName(php_uname('n')) }}</strong></a> --}}
                    <form id="global_search_form" action="/books" method="GET">
                    @csrf
                    
                        <div class="input-group">
                            <input id="global_search_input" name="title" type="text" class="form-control form-controller" placeholder="ძებნა..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <select class="custom-select form-controller" id="global_search_select" onchange="global_search();">
                                    <option value="1">წიგნები</option>
                                    <option value="2">ავტორები</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </div>
                        </div>

                    </form>

                    <script>
                        function global_search() {
                            var type = $('#global_search_select').val();
                            switch(type) {
                                case '1': { // reports
                                    $('#global_search_input').attr('name','title');
                                    $('#global_search_form').attr('action','/books');
                                    break;
                                }
                                case '2': { // authors
                                    $('#global_search_input').attr('name','name');
                                    $('#global_search_form').attr('action','/authors');
                                    break;
                                }
                            }
                            console.log(type)
                        }
                    </script>
                        
                </div>
                <div class="col-5" style="text-align:right">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
        
                        </ul>
        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                {{-- messages --}}
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                    ><img src="{{asset('uploads/chat.svg')}}" height="20px"></i> 
                                    </a>
                                </li> --}}
                                {{-- Notifications --}}
                                <li class="nav-item dropdown">
                                    {{-- <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                        ><img src="{{asset('uploads/planet-earth.svg')}}" height="20px"><span id="unread_notifications_sum" class="caret newNumbr" style="display: none"></span></i> 
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <div id="notifications_dropdown"></div>
                                        <a class="dropdown-item" href="/notifications" style="text-align: center">See all ...</a>
                                    </div> --}}
                                </li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        
                                        <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">
                                            <i class="fa fa-user-circle" aria-hidden="true"></i> Profile
                                        </a>
        
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </nav>

    <div class="container-fruit" style="padding: 10pt 20pt 0pt 20pt; min-height: 550pt">
        @yield('content')
    </div>

    <div style="padding: 5pt"></div>
    
    <footer class="page-footer font-small blue pt-4 footer-my">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    {{-- <img src="{{asset('uploads/gorgia-logo.PNG')}}" style="height: 75pt"> --}}
                    {{-- <h5 class="text-uppercase">GORGIA</h5> --}}
                    {{-- <p>Here you can use rows and columns to organize your footer content.</p> --}}
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">-</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" target="_blank">-</a></li>
                        <li><a href="#" target="_blank">-</a></li>
                        <li><a href="#" target="_blank">-</a></li>
                        <li><a href="#" target="_blank">-</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">-</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" target="_blank">-</a></li>
                        <li><a href="#" target="_blank">-</a></li>
                        <li><a href="#" target="_blank">-</a></li>
                        <li><a href="#" target="_blank">-</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-2">
            © 2019 Copyright: <a href="https://facebook.com/gtsvimitidze" target="_blank">George Tsvimitidze</a>
        </div>
    </footer>

    {{-- @include('ajax.notifications') --}}
    
</body>
</html>
