<!-- sticky header -->
@if (Request::is('blog'))
    <div class="row justify-content-between align-items-center bg-secondary-subtle py-3">
        <div class="col-5 d-inline-flex justify-content-center">
            <img src="{{ asset('assets/img/header.png') }}" />
        </div>
        <div class="col-5 d-inline-flex justify-content-center">
            <form action="/blog" class="input-group input-group w-75">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <input type="text" class="form-control rounded-start" placeholder="Search" name="search" value="{{ request('search') }}" />
                <button class="btn btn-primary" type="submit"><i class="fas fa-search text-white"></i></button>
            </form>
        </div>
    </div>
@endif
<!-- end sticky header -->

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark border-4 border-bottom border-primary shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand text-primary fst-italic fw-bold" href="/">mirazensa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-5">
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ Request::is('blog') ? 'active' : '' }}" href="/blog">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ Request::is('portfolio') ? 'active' : '' }}" href="/portfolio">PORTFOLIO</a>
                </li>
                @auth
                    <li class="nav-item dropdown ms-3">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </button>
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
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- end navbar -->
