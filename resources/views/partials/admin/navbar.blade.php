<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <a class="btn btn-info mt-3" target="_blank" style="max-height: 30px" href="{{ route('home') }}">Go to web</a>
        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->first_name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">{{ Auth::user()->first_name }}</p>
                            <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.edit', Auth::user()->id) }}" class="nav-link">
                                    <i data-feather="user"></i>
                                    <span>Edit profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.change_password') }}" class="nav-link">
                                    <i data-feather="edit"></i>
                                    <span>Change password</span>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="nav-link">
                                    <i data-feather="log-out"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
