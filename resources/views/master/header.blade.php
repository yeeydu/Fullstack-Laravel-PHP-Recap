<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
        @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link main-nav  @if (Request::is('/')) active @endif " aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav @if (Request::is('about')) active @endif" href="{{ url('about') }} ">About</a>
                    </li>
                    <li class="nav-item dropdown navDropdown">
                        <a  class="nav-link dropdown-toggle "  role="button" data-hover="dropdown" @if (Request::is('products')) active @endif  aria-expanded="false" href="{{ url('products') }}">
                            Products
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Product Cat 1</a></li>
                            <li><a class="dropdown-item" href="#">Product Cat 2</a></li>
                            <li><a class="dropdown-item" href="#">Product Cat 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav @if (Request::is('contact')) active @endif"
                        href="{{ url('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>