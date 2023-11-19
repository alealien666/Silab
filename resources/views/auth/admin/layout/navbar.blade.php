<div class="layout-width">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                id="topnav-hamburger-icon">
                <span class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-md-block">
                <div class="position-relative">
                    <input type="hidden" class="form-control" placeholder="Search..." autocomplete="off"
                        id="search-options" value="">
                    <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                        id="search-close-options"></span>
                </div>
                <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                    <div data-simplebar style="max-height: 320px;">
                        <!-- item-->
                        <div class="dropdown-header">
                            <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                        </div>

                        <div class="dropdown-item bg-transparent text-wrap">
                            <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i
                                    class="mdi mdi-magnify ms-1"></i></a>
                            <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i
                                    class="mdi mdi-magnify ms-1"></i></a>
                        </div>
                        <!-- item-->
                        <div class="dropdown-header mt-2">
                            <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                            <span>Analytics Dashboard</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                            <span>Help Center</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                            <span>My account settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header mt-2">
                            <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                        </div>


                    </div>

                    <div class="text-center pt-3 pb-1">
                        <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i
                                class="ri-arrow-right-line ms-1"></i></a>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex align-items-center">

            <div class="dropdown ms-sm-3 header-item topbar-user">
                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <img class="rounded-circle header-profile-user"
                            src="{{ auth()->user()->avatar == null ? url(asset('img/avatar/no-pic.png')) : (filter_var(auth()->user()->avatar, FILTER_VALIDATE_URL) ? auth()->user()->avatar : url(asset(auth()->user()->avatar))) }}"
                            alt="pp">
                        <span class="text-start ms-xl-2">
                            <span
                                class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                            <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <h6 class="dropdown-header">Welcome ! {{ auth()->user()->name }}</h6>
                    <a class="dropdown-item" href="pages-profile.html"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Profile</span></a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('metu') }}" method="GET">
                        @csrf
                        <button type="submit" class="dropdown-item"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout"
                                onclick="confirm('Yakin Ingin Keluar?')">Logout</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
