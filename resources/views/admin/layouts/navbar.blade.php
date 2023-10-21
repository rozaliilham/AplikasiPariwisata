@foreach ($setting as $row)
    <div class="header ">

        <div class="header-left bg-info">
            <a href="{{ route('dashboard') }}" class="logo ">
                <div class="row">
                    <h4 class="text-light"> {{ $row->web }}</h4>
                </div>
            </a>
            <a href="{{ route('dashboard') }}" class="logo logo-small">
                <img src="{{ asset('storage/' . $row->logo) }}" alt="Logo" width="30" height="30">
            </a>
        </div>

        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here" valu>
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>


        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>


        <ul class="nav user-menu">


            <li class="nav-item dropdown noti-dropdown me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/icons/header-icon-05.svg') }}" alt="">
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifikasi Pengunjung Wisata</span>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            @foreach ($coment as $row)
                                <li class="notification-message">
                                    <a>
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{{ asset('pria.png') }}">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span
                                                        class="noti-title">{{ $row->name }}</span>

                                                </p>
                                                <br>
                                                <p class="noti-details"><span
                                                        class="noti-title">{{ $row->comment }}</span>
                                                </p>
                                                <br>
                                                <p class="noti-time"><span
                                                        class="notification-time">{{ $row->created_at->diffForHumans() }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="{{ route('komentar-wisata') }}">View all Notifications</a>
                    </div>
                </div>
            </li>

            <li class="nav-item zoom-screen me-2">
                <a href="#" class="nav-link header-nav-list">
                    <img src="{{ asset('assets/img/icons/header-icon-04.svg') }}" alt="">
                </a>
            </li>

            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{ asset('pria.png') }}" width="31" alt="Jassa Rich">
                        <div class="user-text">
                            <h6>{{ auth()->user()->name }}</h6>
                            {{-- <p class="text-muted mb-0">Administrator</p> --}}
                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{ asset('pria.png') }}" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{ auth()->user()->name }}</h6>
                            {{-- <p class="text-muted mb-0">Administrator</p> --}}
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ route('my-profile') }}">My Profile</a>
                    {{-- <a class="dropdown-item" href="inbox">Inbox</a> --}}
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </li>

        </ul>

    </div>
@endforeach
