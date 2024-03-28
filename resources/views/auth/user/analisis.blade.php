@extends('layouts.silab')

@section('search')
    <form class="app-search d-none d-md-block" action="{{ route('analisis') }}" method="get">
        @csrf
        <div class="position-relative d-flex">
            <input type="search" method="GET" name="cari" class="form-control" placeholder="Search..." autocomplete="off"
                id="search-options" value="{{ old('cari') }}">
            <button type="submit" class="btn btn-primary ms-3 ">Cari</button>
            <span class="mdi mdi-magnify search-widget-icon"></span>
            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                id="search-close-options"></span>
        </div>
    </form>
@endsection
@section('responsive-search')
    <form class="p-3">
        @csrf
        <div class="form-group m-0">
            <div class="input-group">
                <input type="search" action="{{ route('analisis') }}" name="cari" class="form-control"
                    placeholder="Search ..." aria-label="Recipient's username" value="{{ old('cari') }}">
                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
            </div>
        </div>
    </form>
@endsection
@section('kategori')
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class='bx bx-category-alt fs-22'></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <p class="ps-3"><b>Category</b></p>
        <hr>
        @foreach ($categories as $kategori)
            <a href="{{ route('analisis.kategori', ['category' => $kategori->category]) }}"
                class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                <span class="align-middle">{{ $kategori->category }}</span>
            </a>
        @endforeach
    </div>
@endsection
@section('konten')
    <div class="page-content">
        <div class="container-fluid">
            <div id="error-message" class="alert alert-danger" style="display: none;">
                @if (session('error'))
                    {{ session('error') }}
                @endif
            </div>
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Halaman Sewa Jasa Analisis</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Jasa Analisis</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    <div class="text-center mb-4">
                        <h4 class="fw-semibold fs-23">Sewa Lab & Jasa Analisis</h4>
                        <p class="text-muted mb-4 fs-15">Simple pricing. No hidden fees. Advanced features for
                            you business.</p>

                        <div class="d-inline-flex">
                            <ul class="nav nav-pills arrow-navtabs plan-nav rounded mb-3 p-1" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="/lab" class="nav-link fw-semibold">Sewa Lab</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="/analisis" class="nav-link fw-semibold active">Jasa
                                        Analisis</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach ($analis as $item)
                    <div class="col-xxl-3 col-lg-6">
                        <div class="card pricing-box">
                            <div class="card-body bg-light m-2 p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0 fw-semibold">Harga</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="month mb-0">Rp {{ number_format($item->harga, 0, ',', '.') }} <small
                                                class="fs-13 text-muted">/Sample</small>
                                        </h2>
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
                                                <b>Jenis Pengujian: </b> {{ $item->jenis_pengujian }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 text-success me-1">
                                                <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <b>Jenis Analisa: </b> {{ $item->jenis_analisa }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 text-success me-1">
                                                <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <b>Kategori: </b> {{ $item->category->category }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="mt-3 pt-2 col-md-12">
                                        <a href="/orderAnalisis/{{ $item->slug }}" class="btn btn-success w-100"
                                            id="disableButtonAnalisis">Sewa
                                            Jasa
                                            Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
            <div class="pagination justify-content-center mt-3">{{ $analis->links('pagination::bootstrap-4') }}
            </div>

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
                        Design & Develop by Tefa Polije
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
