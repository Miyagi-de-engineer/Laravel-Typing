 <nav class="navbar navbar-expand-md navbar-light tempting-azure-gradient shadow-sm blue-gradient">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Code Type') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @endguest

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('drills.new') }}"><i class="far fa-list-alt mr-2"></i>{{ __('Go New') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <i class="fas fa-user-circle"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <button class="dropdown-item" type="button"
                                            onclick="location.href='{{ route('drills.myPage',[Auth::user()->user_id])}}'">
                                    マイページ
                                    </button>
                                    <div class="dropdown-divider"></div>
                                    <button form="logout-button" class="dropdown-item" type="submit">
                                        ログアウト
                                    </button>
                                </div>
                            </li>
                            <form id="logout-button" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                            <!-- Dropdown -->
                        @endauth

                    </ul>
                </div>
            </div>
        </nav>
