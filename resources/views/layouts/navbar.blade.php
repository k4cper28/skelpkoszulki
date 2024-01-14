<link rel="stylesheet" type="text/css" href="{{ URL('storage/navbar.css') }}">
<nav class="navbar">
    <div class="container">
        <div class="logo_navbar">
            <a href="{{ url('/') }}"><img src="{{ URL('storage/logo.png') }}" width="96" height="96"></a>
        </div>
        <div class="menu_bar">

            <a href="{{ url('/') }}"> STRONA GŁÓWNA </a>
            <a href="{{ url('/sklep') }}"> SKLEP </a>
            <a href="{{ url('/onas') }}"> O NAS </a>
            <a href="{{ url('/kontakt') }}"> KONTAKT </a>
        </div>
        <div class="login_navbar">
            <!-- Authentication Links -->
            @guest
                <a href="{{ route('login') }}">LOGIN</a>
                <a href="{{ route('register') }}">REGISTER</a>
            @endguest
            @auth
                <a href="{{ route('register') }}">KOSZYK</a>
                <a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="#" onclick="document.getElementById('logout-form').submit()"><img id="logout"
                                                                                               src="{{ URL('storage/logout.png') }}"
                                                                                               width="16" height="16"></a>
                </form>
            @endauth
        </div>

    </div>
</nav>
