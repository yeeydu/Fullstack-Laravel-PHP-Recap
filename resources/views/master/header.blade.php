<?php // Cart items count
    use App\Http\Controllers\CartController;
    $total = CartController::cartItem();
?>

<div class=" header">
    <nav class="navbar navbar-expand-lg bg-light ">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('img/products-logo.png') }}"
                    alt="products-logo"></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link main-nav  @if (Request::is('/')) active @endif " aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav @if (Request::is('about')) active @endif"
                            href="{{ url('about') }} ">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-hover="dropdown" role="button" aria-expanded="false"
                            id="navbarDropdownMenuLink" @if (Request::is('products')) active @endif
                            aria-expanded="false" aria-haspopup="true" href="{{ url('products') }}">
                            Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
            {{------- cart item count ----}}
            <div class="nav-item">
               <a class="cartlist nav-link" href="{{ route('cartlist') }}"><i class="fa fa-shopping-cart"></i>Cart({{$total}})</a>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav ms-auto">
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @if(session('msg'))
    <p class="msg">{{session('msg')}}</p>
@endif
</div>
