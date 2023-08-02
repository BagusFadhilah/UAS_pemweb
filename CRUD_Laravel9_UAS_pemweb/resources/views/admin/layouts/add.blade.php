<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - My Comic Library</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="{{ route('home') }}" class="brand-logo">My Comic Library</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @auth
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn waves-effect waves-light">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
