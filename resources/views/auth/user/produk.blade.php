@extends('layouts.silab')

@section('search')
    <form class="app-search d-none d-md-block" action="{{ route('index') }}" method="get">
        @csrf
        <div class="position-relative d-flex">
            <input type="text" method="GET" name="cari" class="form-control" placeholder="Search..." autocomplete="off"
                id="search-options">
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
                <input type="search" action="{{ route('index') }}" name="cari" class="form-control"
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
            <a href="{{ route('produk.kategori', ['category' => $kategori->category]) }}"
                class="dropdown-item notify-item language py-2">
                <span class="align-middle">{{ $kategori->category }}</span>
            </a>
        @endforeach
    </div>
@endsection
@section('konten')
    <div class="page-content">
        <div class="container-fluid">
            @if (session('error'))
                <div id="error-message" class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
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
                        <form action="{{ route('searchTanggal') }}" method="get">
                            @csrf
                            <div class="position-relative d-flex mb-4">
                                <input type="date" class="form-control me-3" name="tanggal" id="tanggal"
                                    value="{{ old('tanggal', $searchDate) }}" min="{{ now()->format('Y-m-d') }}">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                            </div>
                        </form>

                        <div class="d-inline-flex">
                            <ul class="nav nav-pills arrow-navtabs plan-nav rounded mb-3 p-1" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="/lab" class="nav-link fw-semibold active">Sewa
                                        Lab</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="/analisis" class="nav-link fw-semibold">Jasa
                                        Analisis</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div id="hasil">
                <div class="row">
                    @if (isset($message))
                        <h3 class="text-center"><i class="bi bi-search"></i> {{ $message }}</h3>
                    @endif
                    @foreach ($datas as $data)
                        <div class="col-xxl-3 col-lg-4">
                            <div class="card pricing-box">
                                <div class="card-body bg-light m-2 p-4">
                                    <img class="mb-4" src="{{ asset('img/jepun.jpg') }}" alt="Jepun" width="100%"
                                        height="100%" style="border-radius: 10px">
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

                                    </ul>
                                    @if ($data->status === 'di gunakan')
                                        <div class="mt-3 pt-2">
                                            <a href="javascript:void(0);" class="btn btn-dark disabled w-100">Lab Sedang
                                                Di
                                                gunakan</a>
                                        </div>
                                    @else
                                        <div class="mt-3 pt-2">
                                            <a href="/order/{{ $data->slug }}" class="btn btn-success w-100">Pilih
                                                Lab</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--end col-->
                </div>
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
                        Design & Develop by AleAndra
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tanggal').on('change', function() {
                const tanggalCari = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '/lab',
                    data: {
                        tanggal: tanggalCari,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        console.log(response); // Tampilkan respons di console
                        $('#hasil').html(response.partialView);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

            })
        })
    </script>
@endsection
