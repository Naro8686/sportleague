<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img width="125" src="{{ asset('admin-assets/future-systems-logo.png') }}" alt="profile">
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
            <li class="nav-item nav-category">{{ trans('global.main') }}</li>
            <li class="nav-item {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">{{ trans('global.dashboard') }}</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#general" role="button" aria-expanded="{{ request()->is('admin/contacts') || request()->is('admin/services') || request()->is('admin/home-page') || request()->is('admin/home-page/*') ? 'true' : 'false' }}" aria-controls="general">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book link-icon"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    <span class="link-title">{{ trans('global.pages') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down link-arrow"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <div class="collapse {{ request()->is('admin/contacts') || request()->is('admin/services') ||  request()->is('admin/home-page') || request()->is('admin/home-page/*') || request()->is('admin/portfolio-page') ? 'show' : '' }}" id="general">
                    <ul class="nav-item">
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#home_pages" role="button" aria-expanded="{{ request()->is('admin/contacts') || request()->is('admin/services') || request()->is('admin/home-page') || request()->is('admin/home-page/*') ? 'true' : 'false' }}" aria-controls="home_pages">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book link-icon"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                <span class="link-title">{{ trans('global.home_page') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down link-arrow"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </a>
                            <div class="collapse {{ request()->is('admin/contacts') || request()->is('admin/services') || request()->is('admin/home-page') || request()->is('admin/home-page/*') ? 'show' : '' }}" id="home_pages">
                                <ul class="nav sub-menu">
                                    <li class="nav-item {{ request()->is('admin/home-page') || request()->is('admin/home-page/*') ? 'active' : '' }}">
                                        <a href="#" class="nav-link">
                                            <i class="link-icon" data-feather="box"></i>
                                            <span class="link-title">{{ trans('global.general') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                                        <a href="#" class="nav-link">
                                            <i class="link-icon" data-feather="box"></i>
                                            <span class="link-title">{{ trans('global.services') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ request()->is('admin/contacts') || request()->is('admin/contacts/*') ? 'active' : '' }}">
                                        <a href="#" class="nav-link">
                                            <i class="link-icon" data-feather="message-square"></i>
                                            <span class="link-title">{{ trans('global.contacts') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        <li class="nav-item {{ request()->is('admin/portfolio-page') || request()->is('admin/portfolio-page/*') ? 'active' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">{{ trans('global.portfolio_page') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ request()->is('admin/league') || request()->is('admin/league/*') ? 'active' : '' }}">
                <a href="{{ route('admin.league.edit', 1) }}" class="nav-link">
                    <i class="link-icon" data-feather="star"></i>
                    <span class="link-title">League</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/clubs') || request()->is('admin/clubs/*') ? 'active' : '' }}">
                <a href="{{ route('admin.clubs.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Clubs</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/races') || request()->is('admin/races/*') ? 'active' : '' }}">
                <a href="{{ route('admin.races.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="truck"></i>
                    <span class="link-title">Races</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/privacy-policy') || request()->is('admin/privacy-policy/*') ? 'active' : '' }}">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="alert-triangle"></i>
                    <span class="link-title">Privacy policy</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.edit', \Illuminate\Support\Facades\Auth::user()->id) }}" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Profile</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/users/'.Auth::user()->id.'/edit') || request()->is('admin/users/'.Auth::user()->id.'/edit') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                <a href="{{ route('admin.roles.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Roles</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="link-title">Permissions</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
