<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">Admin Dashboard</div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">About</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::is('dashboard/slide') ? 'active' : '' }}" href="/dashboard/slide">Slide</a>
        @can('admin')
            <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::is('dashboard/kategori') ? 'active' : '' }}" href="/dashboard/kategori">Kategori</a>
        @endcan
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ Request::is('dashboard/artikel') ? 'active' : '' }}" href="/dashboard/artikel">Artikel</a>
    </div>
</div>
