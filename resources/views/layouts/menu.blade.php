<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('index-occurrence-type') }}" class="nav-link {{ Request::is('index-occurrence-type') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Occurances Type</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('index-occurrence') }}" class="nav-link {{ Request::is('index-occurrence') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Occurances</p>
    </a>
</li>

