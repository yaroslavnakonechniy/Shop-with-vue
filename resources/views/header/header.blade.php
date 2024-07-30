<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('layout.main')}}">Internet shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li @routeactive('main.product*') class="nav-item">
                <a class="nav-link" href="{{route('main.products.show')}}">Products</a>
            </li>
            <li @routeactive('main.categor*') class="nav-item">
                <a class="nav-link" href="{{route('main.categories.show')}}">Categories</a>
            </li>
            <li @routeactive('aboute*') class="nav-item">
                <a class="nav-link" href="{{route('layout.main')}}">About</a>
            </li>
            <li @routeactive('contact*') class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li @routeactive('login') class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li @routeactive('register') class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @else
                @can('view', auth()->user())
                    <li @routeactive('admin.main.index') class="nav-item dropdown"><a class="nav-link" href="{{ route('admin.main.index') }}">Панель администратора</a></li>
                @endcan
                @auth
                    @can('registered', auth()->user())
                        <li @routeactive('orders.user.index') class="nav-item">
                            <a class="nav-link" href="{{ route('orders.user.index') }}">Orders</a>
                        </li>
                    @endcan
                @endauth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <li @routeactive('cart*') class="nav-item">
                <a class="nav-link" href="{{ route('cart.index') }}">
                    <i class="bi bi-cart"></i> Cart
                </a>
            </li>
        </ul>
    </div>
</nav>