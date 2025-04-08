
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/dashboard') }}" class="nav-link">خانه</a>
            </li>
        </ul>
        <ul style="padding-left: 10px" class="navbar-nav mr-auto">
            <li class="ml-3" style="position:relative;">
                @guest
                    @if (Route::has('login'))
                        <a class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </a>
                    @endif
                @else
                @endguest
            </li>



        </ul>
    </nav>
