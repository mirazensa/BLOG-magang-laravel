<nav class="navbar navbar-expand-lg bg-dark navbar-dark border-2 border-bottom border-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-medium pe-5" href="/">MIRAZENSA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav fw-medium">
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ Request::is('/') ? 'active' : '' }}" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ Request::is('about') ? 'active' : '' }}" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ Request::is('blog') ? 'active' : '' }}" href="/blog">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ Request::is('categories') ? 'active' : '' }}" href="/categories">CATEGORIES</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome Back,{{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt me-1"></i>My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-1"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link"><i class="fas fa-sign-in-alt pe-1P me-1"></i>Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
