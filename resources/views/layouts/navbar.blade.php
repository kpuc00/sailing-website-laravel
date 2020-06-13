<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/home">Fontys Sailing</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="/aboutus">About us</a>
            </li>

            <!-- Courses nav item -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Courses
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach (App\Course::GetIdName() as $course)
                        <a class="dropdown-item" href="/course/{{ $course->id }}">{{ $course->name }}</a>
                    @endforeach
                </div>
            </li>

            <!-- Regattas nav item -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Regattas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach (App\Regatta::GetIdName() as $regatta)
                        <a class="dropdown-item" href="/regatta/{{ $regatta->id }}">{{ $regatta->name }}</a>
                    @endforeach
                </div>
            </li>


            <!-- Coaches nav item -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Coaches
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach (App\Coach::GetIdName() as $coach)
                        <a class="dropdown-item" href="/coach/{{ $coach->id }}">{{ $coach->firstName . $coach->lastName }}</a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/article">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Anouncments</a>
            </li>

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
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/home">Home page</a>
                        </div>

                        <a href="/user/{{ Auth::user()->id }}" class="dropdown-item">Profile page</a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
