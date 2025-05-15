<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('teams.index') }}" class="nav-link {{ Request::is('teams*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Teams</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pods.index') }}" class="nav-link {{ Request::is('pods*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Pods</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('clients.index') }}" class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Clients</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('sites.index') }}" class="nav-link {{ Request::is('sites*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Sites</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('profiles.index') }}" class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Profiles</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('skills.index') }}" class="nav-link {{ Request::is('skills*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Skills</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Roles</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('client-statuses.index') }}" class="nav-link {{ Request::is('client-statuses*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Client Statuses</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('client-weights.index') }}" class="nav-link {{ Request::is('client-weights*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Client Weights</p>
    </a>
</li>
