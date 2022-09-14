<nav class="navbar navbar-vertical fixed-start navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

{{--        <a class="navbar-brand" href="">--}}
{{--            <img src="{{ asset('storage/logo.png') }}" class="navbar-brand-img mx-auto" alt="">--}}
{{--        </a>--}}

        <div class="navbar-user d-md-none">
            <div class="dropdown">
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-bs-toggle="dropdown">

                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarIcon">
                    <a href="#" class="dropdown-item" onclick="document.getElementById('logout').submit()">
                        Выйти
                        <form action="" method="POST" id="logout" accept-charset="utf-8">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="sidebarCollapse">


            <h6 class="navbar-heading">Услуги</h6>

            <ul class="navbar-nav mb-md-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('*/visitor*') ? 'active' : '' }}" href="{{ route('visitor.index') }}"><i class="fe fe-list"></i>Експорт Документа </a>
                </li>

            </ul>

            <h6 class="navbar-heading">Пользователи</h6>

            <ul class="navbar-nav mb-md-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('*/users*') ? 'active' : '' }}" href="{{ route('users.index', ['type' => 0]) }}"><i class="fe fe-users"></i>Пользователи</a>
                </li>
                <li class="nav-item">
                </li>
            </ul>
            <div class="mt-auto"></div>

            <div class="navbar-user d-none d-md-flex justify-content-end" id="sidebarUser">
                <div class="dropup">
                    <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="" class="img-fluid rounded-circle" alt="Выход">
                        </div>
                    </a>

                    <div class="dropdown-menu" style="left: 0; transform: none;">
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="document.getElementById('logout').submit()">
                            Выйти
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>

                <span class="navbar-user-link ms-3">
                    {{ auth()->user()->fullname }}
                </span>
            </div>
        </div>
    </div>
</nav>
