<nav class="navbar navbar-expand-lg bg-dark navbar-dark border-2 border-bottom border-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-medium pe-5" href="/">MIRAZENSA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav fw-medium">
                <li class="nav-item pe-2">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page" href="/">HOME</a>
                </li>
                <li class="nav-item pe-2">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">ABOUT</a>
                </li>
                <li class="nav-item pe-2">
                    <a class="nav-link {{ $active === 'blog' ? 'active' : '' }}" href="/blog">BLOG</a>
                </li>
                <li class="nav-item pe-2">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">CATEGORIES</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
