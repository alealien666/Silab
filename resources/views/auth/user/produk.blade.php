@extends('layouts.silab')

@section('search')
    <form class="app-search d-none d-md-block" action="{{ route('index') }}" method="get">
        @csrf
        <div class="position-relative d-flex">
            <input type="search" id="cari" method="GET" name="cari" class="form-control" placeholder="Search..."
                autocomplete="off" id="search-options" value="{{ old('cari') }}">
            <button type="submit" class="btn btn-primary ms-3 ">Cari</button>
            <span class="mdi mdi-magnify search-widget-icon"></span>
            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                id="search-close-options"></span>
        </div>
    </form>
@endsection
@section('konten')
    <div class="page-content">
        <div class="container-fluid">
            <div id="error-message" class="alert alert-danger" style="display: none;">
                @if (session('error'))
                    {{ session('error') }}
                @endif
            </div>
            {{-- breadcrumbs --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Halaman Sewa Lab</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/lab">Home</a></li>
                                <li class="breadcrumb-item active">Sewa Lab</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            {{-- end --}}

            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    <div class="text-center mb-4">
                        <h4 class="fw-semibold fs-23">Sewa Lab & Jasa Analisis</h4>
                        <p class="text-muted mb-4 fs-15">Simple pricing. No hidden fees. Advanced features for
                            you business.</p>

                        <div class="d-inline-flex">
                            <ul class="nav nav-pills arrow-navtabs plan-nav rounded mb-3 p-1" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="/lab" class="nav-link fw-semibold active">Sewa
                                        Lab</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="/analisis" class="nav-link fw-semibold">Jasa
                                        Analisis <span class="badge bg-success">25%
                                            Off</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @if (isset($message))
                    <h3 class="text-center"><i class="bi bi-search"></i> {{ $message }}</h3>
                @endif
                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-category-alt fs-22'></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <p class="ps-3"><b>Category</b></p>
                        <hr>
                        @foreach ($categories as $kategori)
                            <a href="{{ route('produk.kategori', ['category' => $kategori->category]) }}"
                                class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                                <span class="align-middle">{{ $kategori->category }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                @foreach ($datas as $data)
                    <div class="col-xxl-3 col-lg-6">
                        <div class="card pricing-box">
                            <div class="card-body bg-light m-2 p-4">
                                <img class="mb-4" src="img/jepun.jpg" alt="Jepun" width="100%" height="100%"
                                    style="border-radius: 10px">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0 ">Nama Lab: {{ $data->nama_lab }}</h5>
                                    </div>
                                </div>

                                <p class="text-muted">The perfect way to get started and get used to our tools.</p>
                                <ul class="list-unstyled vstack gap-3">
                                    <li>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 text-success me-1">
                                                <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <b>{{ $data->kapasitas }}</b> Orang
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 text-success me-1">
                                                <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                {{ $data->category->category }}
                                            </div>
                                        </div>
                                    </li>
                                    @if ($data->status === 'di gunakan')
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 text-danger me-1">
                                                    <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    {{ $data->status }}
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 text-success me-1">
                                                    <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    {{ $data->status }}
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                                @if ($data->status === 'di gunakan')
                                    <div class="mt-3 pt-2">
                                        <a href="javascript:void(0);" class="btn btn-dark disabled w-100">Lab Sedang Di
                                            gunakan</a>
                                    </div>
                                @else
                                    <div class="mt-3 pt-2">
                                        <a href="/lab/{{ $data->slug }}" class="btn btn-success w-100">Pilih
                                            Lab</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--end col-->
            </div><!--end row-->

            {{-- <div class="row justify-content-center mt-5">
                <div class="col-lg-5">
                    <div class="text-center mb-4 pb-2">
                        <h4 class="fw-semibold fs-23">Choose the plan that's right for you</h4>
                        <p class="text-muted mb-4 fs-15">Simple pricing. No hidden fees. Advanced features for
                            you business.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card pricing-box">
                                <div class="card-body p-4 m-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1 fw-semibold">Basic Plan</h5>
                                            <p class="text-muted mb-0">For Startup</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary">
                                                <i class="ri-book-mark-line fs-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <h2><sup><small>$</small></sup>19 <span class="fs-13 text-muted">/Month</span>
                                        </h2>
                                    </div>
                                    <hr class="my-4 text-muted">
                                    <div>
                                        <ul class="list-unstyled text-muted vstack gap-3">
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Upto <b>3</b> Projects
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Upto <b>299</b> Customers
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Scalable Bandwidth
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>5</b> FTP Login
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>24/7</b> Support
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Storage
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Domain
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-secondary w-100 waves-effect waves-light">Sign
                                                up free</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-4">
                            <div class="card pricing-box ribbon-box right">
                                <div class="card-body p-4 m-2">
                                    <div class="ribbon-two ribbon-two-danger"><span>Popular</span></div>
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">Pro Business</h5>
                                                <p class="text-muted mb-0">Professional plans</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                    <i class="ri-medal-line fs-20"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-4">
                                            <h2><sup><small>$</small></sup> 29<span class="fs-13 text-muted">/Month</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <hr class="my-4 text-muted">
                                    <div>
                                        <ul class="list-unstyled vstack gap-3 text-muted">
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Upto <b>15</b> Projects
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Customers
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Scalable Bandwidth
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>12</b> FTP Login
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>24/7</b> Support
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Storage
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Domain
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="javascript:void(0);"
                                                class="btn btn-success w-100 waves-effect waves-light">Get
                                                started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-4">
                            <div class="card pricing-box">
                                <div class="card-body p-4 m-2">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">Platinum Plan</h5>
                                                <p class="text-muted mb-0">Enterprise Businesses</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                    <i class="ri-stack-line fs-20"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-4">
                                            <h2><sup><small>$</small></sup> 39<span class="fs-13 text-muted">/Month</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <hr class="my-4 text-muted">
                                    <div>
                                        <ul class="list-unstyled vstack gap-3 text-muted">
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Projects
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Customers
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Scalable Bandwidth
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> FTP Login
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>24/7</b> Support
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Storage
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Domain
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-secondary w-100 waves-effect waves-light">Get
                                                started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center mt-5">
                <div class="col-lg-4">
                    <div class="text-center mb-4 pb-2">
                        <h4 class="fw-semibold fs-23">Simple Pricing Plan</h4>
                        <p class="text-muted mb-4 fs-15">Simple pricing. No hidden fees. Advanced features for
                            you business.</p>

                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card pricing-box text-center">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body h-100">
                                    <div>
                                        <h5 class="mb-1">Starter</h5>
                                        <p class="text-muted">Starter plans</p>
                                    </div>

                                    <div class="py-4">
                                        <h2><sup><small>$</small></sup>22 <span class="fs-13 text-muted"> /Per
                                                month</span></h2>
                                    </div>

                                    <div class="text-center plan-btn mt-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-success w-sm waves-effect waves-light">Sign up</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="card-body border-start mt-4 mt-lg-0">
                                    <div class="card-header bg-light">
                                        <h5 class="fs-16 mb-0">Plan Features:</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <ul class="list-unstyled vstack gap-3 mb-0">
                                            <li>Users: <span class="text-success fw-semibold">1</span></li>
                                            <li>Storage: <span class="text-success fw-semibold">01 GB</span>
                                            </li>
                                            <li>Domain: <span class="text-success fw-semibold">No</span></li>
                                            <li>Support: <span class="text-success fw-semibold">No</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!--end row-->

                <div class="col-lg-6">
                    <div class="card pricing-box ribbon-box ribbon-fill text-center">
                        <div class="ribbon ribbon-primary shadow-none">New</div>
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body h-100">
                                    <div>
                                        <h5 class="mb-1">Professional</h5>
                                        <p class="text-muted">Professional plans</p>
                                    </div>

                                    <div class="py-4">
                                        <h2><sup><small>$</small></sup>29 <span class="fs-13 text-muted">/Per
                                                month</span></h2>
                                    </div>

                                    <div class="text-center plan-btn mt-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-success w-sm waves-effect waves-light">Sign up</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="card-body border-start mt-4 mt-lg-0">
                                    <div class="card-header bg-light">
                                        <h5 class="fs-16 mb-0">Plan Features:</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <ul class="list-unstyled vstack gap-3 mb-0">
                                            <li>Users: <span class="text-success fw-semibold">3</span></li>
                                            <li>Storage: <span class="text-success fw-semibold">10 GB</span>
                                            </li>
                                            <li>Domain: <span class="text-success fw-semibold">Yes</span></li>
                                            <li>Support: <span class="text-success fw-semibold">No</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!--end row-->

                <div class="col-lg-6">
                    <div class="card pricing-box ribbon-box ribbon-fill text-center">
                        <div class="ribbon ribbon-primary shadow-none">New</div>
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body h-100">
                                    <div>
                                        <h5 class="mb-1">Enterprise</h5>
                                        <p class="text-muted">Enterprise plans</p>
                                    </div>

                                    <div class="py-4">
                                        <h2><sup><small>$</small></sup>39 <span class="fs-13 text-muted">/Per
                                                month</span></h2>
                                    </div>

                                    <div class="text-center plan-btn mt-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-success w-sm waves-effect waves-light">Sign up</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="card-body border-start mt-4 mt-lg-0">
                                    <div class="card-header bg-light">
                                        <h5 class="fs-16 mb-0">Plan Features:</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <ul class="list-unstyled vstack gap-3 mb-0">
                                            <li>Users: <span class="text-success fw-semibold">3</span></li>
                                            <li>Storage: <span class="text-success fw-semibold">20 GB</span>
                                            </li>
                                            <li>Domain: <span class="text-success fw-semibold">Yes</span></li>
                                            <li>Support: <span class="text-success fw-semibold">Yes</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!--end col-->

                <div class="col-lg-6">
                    <div class="card pricing-box text-center">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body h-100">
                                    <div>
                                        <h5 class="mb-1">Unlimited</h5>
                                        <p class="text-muted">Unlimited plans</p>
                                    </div>
                                    <div class="py-4">
                                        <h2><sup><small>$</small></sup>49 <span class="fs-13 text-muted">/Per
                                                month</span></h2>
                                    </div>

                                    <div class="text-center plan-btn mt-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-success w-sm waves-effect waves-light">Sign up</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="card-body border-start mt-4 mt-lg-0">
                                    <div class="card-header bg-light">
                                        <h5 class="fs-16 mb-0">Plan Features:</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <ul class="list-unstyled vstack gap-3 mb-0">
                                            <li>Users: <span class="text-success fw-semibold">5</span></li>
                                            <li>Storage: <span class="text-success fw-semibold">40 GB</span>
                                            </li>
                                            <li>Domain: <span class="text-success fw-semibold">Yes</span></li>
                                            <li>Support: <span class="text-success fw-semibold">Yes</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!--end col-->
            </div><!--end row--> --}}

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Silab.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by AleAndra
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
