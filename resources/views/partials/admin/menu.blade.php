<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('home') }}" class="sidebar-brand">
            <h5>League Manager</h5>
            <span></span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">{{ _e('Main') }}</li>
            <li class="nav_items {{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">{{ _e('Dashboard') }}</span>
                </a>
            </li>

            @if(Auth::user()->hasRole('administrator'))
                <li class="nav_items {{ request()->is('admin/payments') ? 'active' : '' }}">
                    <a href="{{ route('admin.payments') }}" class="nav-link">
                        <i class="link-icon" data-feather="shopping-cart"></i>
                        <span class="link-title">{{ _e('Payments') }}</span>
                    </a>
                </li>
                <li class="nav_items {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="eye"></i>
                        <span class="link-title">{{ _e('Roles') }}</span>
                    </a>
                </li>
                <li class="nav_items {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="key"></i>
                        <span class="link-title">{{ _e('Permissions') }}</span>
                    </a>
                </li>
            @endif

            @canany(['league_manage'])
                <li class="nav_items {{ request()->is('admin/league') || request()->is('admin/league/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.league.edit', 1) }}" class="nav-link">
                        <i class="link-icon" data-feather="star"></i>
                        <span class="link-title">{{ _e('League') }}</span>
                    </a>
                </li>
            @endcanany

            @canany(['clubs_manage'])
                <li class="nav_items {{ request()->is('admin/clubs') || request()->is('admin/clubs/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.clubs.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">{{ _e('Clubs') }}</span>
                    </a>
                </li>
            @endcanany

            @canany(['races_manage', 'view_races'])
                <li class="nav_items {{ request()->is('admin/races') || request()->is('admin/races/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.races.index') }}" class="nav-link">
                        <img src="{{ asset('race.png') }}" alt="Race" width="16">
                        <span class="link-title">{{ _e('Races') }}</span>
                    </a>
                </li>
            @endcanany

            @canany(['race_categories_manage'])
                <li class="nav_items {{ request()->is('admin/race-categories') || request()->is('admin/race-categories/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.race-categories.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="list"></i>
                        <span class="link-title">{{ _e('Race categories') }}</span>
                    </a>
                </li>
            @endcanany

            @canany(['users_manage', 'view_users'])
                <li class="nav_items {{ request()->is('admin/users') || request()->is('admin/users/*') && !request()->is('admin/users/*/edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">{{ _e('Users') }}</span>
                    </a>
                </li>
            @endcanany

            @if(!Auth::user()->hasRole('administrator'))
                <li class="nav_items {{ request()->is('admin/profile') ? 'active' : '' }}">
                    <a href="{{ route('admin.profile') }}" class="nav-link">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">{{ _e('Profile') }}</span>
                    </a>
                </li>
            @endif

            @canany(['privacy_manage'])
                <li class="nav_items {{ request()->is('admin/privacy-policy/1/edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.privacy-policy.edit', 1) }}" class="nav-link">
                        <i class="link-icon" data-feather="alert-triangle"></i>
                        <span class="link-title">{{ _e('Privacy policy') }}</span>
                    </a>
                </li>
                <li class="nav_items {{ request()->is('admin/privacy-policy/2/edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.privacy-policy.edit', 2) }}" class="nav-link">
                        <i class="link-icon" data-feather="align-center"></i>
                        <span class="link-title">{{ _e('FAQ') }}</span>
                    </a>
                </li>
                <li class="nav_items {{ request()->is('admin/privacy-policy/3/edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.privacy-policy.edit', 3) }}" class="nav-link">
                        <i class="link-icon" data-feather="align-center"></i>
                        <span class="link-title">{{ _e('Terms') }}</span>
                    </a>
                </li>
            @endcanany

            @canany(['texts_manage'])
                <li class="nav_items {{ request()->is('admin/texts') || request()->is('admin/texts/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.texts.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="type"></i>
                        <span class="link-title">{{ _e('Texts') }}</span>
                    </a>
                </li>
            @endcanany

            @canany(['settings_manage'])
                <li class="nav_items {{ request()->is('admin/coming') || request()->is('admin/coming/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.coming') }}" class="nav-link">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">{{ _e('Settings') }}</span>
                    </a>
                </li>
            @endcanany
        </ul>
    </div>
</nav>
