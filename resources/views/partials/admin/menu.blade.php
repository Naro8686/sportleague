<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <h5>Sport League</h5>
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
            <li class="nav-item nav-category">Main</li>
            <li class="nav_items {{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            @if(Auth::user()->hasRole('administrator'))
                {{--                <li class="nav_items ">--}}
                {{--                    <a class="nav-link" data-toggle="collapse" href="#general" role="button" aria-expanded="{{ request()->is('admin/contacts') || request()->is('admin/services') || request()->is('admin/home-page') || request()->is('admin/home-page/*') ? 'true' : 'false' }}" aria-controls="general">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book link-icon"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>--}}
                {{--                        <span class="link-title">{{ trans('global.pages') }}</span>--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down link-arrow"><polyline points="6 9 12 15 18 9"></polyline></svg>--}}
                {{--                    </a>--}}
                {{--                    <div class="collapse {{ request()->is('admin/contacts') || request()->is('admin/services') ||  request()->is('admin/home-page') || request()->is('admin/home-page/*') || request()->is('admin/portfolio-page') ? 'show' : '' }}" id="general">--}}
                {{--                        <ul class="nav-item">--}}
                {{--                            <li class="nav-item ">--}}
                {{--                                <a class="nav-link" data-toggle="collapse" href="#home_pages" role="button" aria-expanded="{{ request()->is('admin/contacts') || request()->is('admin/services') || request()->is('admin/home-page') || request()->is('admin/home-page/*') ? 'true' : 'false' }}" aria-controls="home_pages">--}}
                {{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book link-icon"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>--}}
                {{--                                    <span class="link-title">Home</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                <li class="nav_items {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Roles</span>
                    </a>
                </li>
                <li class="nav_items {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="key"></i>
                        <span class="link-title">Permissions</span>
                    </a>
                </li>
            @endif

            @canany(['league_manage'])
                <li class="nav_items {{ request()->is('admin/league') || request()->is('admin/league/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.league.edit', 1) }}" class="nav-link">
                        <i class="link-icon" data-feather="star"></i>
                        <span class="link-title">League</span>
                    </a>
                </li>
            @endcanany

            @canany(['clubs_manage'])
                <li class="nav_items {{ request()->is('admin/clubs') || request()->is('admin/clubs/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.clubs.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Clubs</span>
                    </a>
                </li>
            @endcanany

            @canany(['races_manage', 'view_races'])
                <li class="nav_items {{ request()->is('admin/races') || request()->is('admin/races/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.races.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="truck"></i>
                        <span class="link-title">Races</span>
                    </a>
                </li>
            @endcanany

            @canany(['race_categories_manage'])
                <li class="nav_items {{ request()->is('admin/race-categories') || request()->is('admin/race-categories/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.race-categories.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="list"></i>
                        <span class="link-title">Race categories</span>
                    </a>
                </li>
            @endcanany

            @canany(['users_manage', 'view_users'])
                <li class="nav_items {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Users</span>
                    </a>
                </li>
            @endcanany

            {{--            @if(Auth::user()->races->count())--}}
            {{--            <li class="nav_items {{ request()->is('admin/my-races') || request()->is('admin/my-races/*') ? 'active' : '' }}">--}}
            {{--                <a href="{{ route('admin.my-races') }}" class="nav-link">--}}
            {{--                    <i class="link-icon" data-feather="truck"></i>--}}
            {{--                    <span class="link-title">My Races</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            @endif--}}

            {{--            <li class="nav_items {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">--}}
            {{--                <a href="{{ route('admin.users.edit', \Illuminate\Support\Facades\Auth::user()->id) }}" class="nav-link">--}}
            {{--                    <i class="link-icon" data-feather="settings"></i>--}}
            {{--                    <span class="link-title">Profile</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}

            @canany(['privacy_manage'])
                <li class="nav_items {{ request()->is('admin/privacy-policy') ? 'active' : '' }}">
                    <a href="{{ route('admin.privacy-policy.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="alert-triangle"></i>
                        <span class="link-title">Privacy policy</span>
                    </a>
                </li>
            @endcanany

        </ul>
    </div>
</nav>
