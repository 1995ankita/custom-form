<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('project.index') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-form"></i>
        <p>Project</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('form') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-form"></i>
        <p>Custom Fields</p>
    </a>
</li>

