@extends('layouts.silab')
@section('konten')
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content overflow-hidden">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Order</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/silab">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/analisis">Jasa Analisis</a></li>
                                        <li class="breadcrumb-item active">Order</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body checkout-tab">

                                    <form action="{{ route('order-analisis') }}" method="post">
                                        @csrf
                                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                                            <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                                                <li class="nav-item" role="presentation" id="personal-info">
                                                    <button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-bill-info"
                                                        type="button" role="tab" aria-controls="pills-bill-info"
                                                        aria-selected="true"><i
                                                            class="ri-user-2-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                                        Personal Info</button>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                                aria-labelledby="pills-bill-info-tab">
                                                <div>
                                                    <h5 class="mb-1">{{ $analis->jenis_pengujian }}</h5>
                                                    <input type="hidden" name="analis" id="analis"
                                                        value="{{ $analis->jenis_analisis }}">
                                                    <input type="hidden" name="id_analisis" value="{{ $analis->id }}">
                                                    <p class="text-muted mb-4">Please fill all information below</p>
                                                </div>

                                                <div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="billinginfo-firstName"
                                                                    class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" placeholder="Enter name" value=""
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="no-telp" class="form-label">No Telp
                                                                    (WhatsApp)</label>
                                                                <input type="number" class="form-control" name="notelp"
                                                                    id="no-telp" placeholder="No Telp" value=""
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="billinginfo-email"
                                                                    class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    value="{{ auth()->user()->email }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="billinginfo-phone" class="form-label">Jenis
                                                                    Pesanan</label>
                                                                <input type="text" class="form-control" name="jenis"
                                                                    id="jenis" value="Jasa Analisis" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="order" class="form-label">Order</label>
                                                                <input type="date" name="masuk" id="masuk"
                                                                    class="form-control" value{{ old('masuk') }}
                                                                    {{-- {{ $lab && $lab->status === 'tidak tersedia' ? 'disabled' : '' }} --}} required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check card-radio">
                                                                <label class="form-check-label" for="shippingMethod02">
                                                                    <span
                                                                        class="fs-21 float-end mt-2 text-wrap d-block fw-semibold">Rp:
                                                                        {{ number_format($analis->harga, 0, ',', '.') }}
                                                                        <input type="hidden" name="harga"
                                                                            id="" value="{{ $analis->harga }}">
                                                                    </span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap d-block">Expired
                                                                        In 1 Hours</span>
                                                                    <span>Proses Analisis Di Kerjakan Oleh Teknisi
                                                                        Lab</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start m-2">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-label right ms-auto nexttab"
                                                        data-nexttab="pills-bill-address-tab"><i
                                                            class="ri-truck-line label-icon align-middle fs-16 ms-2"></i>Pesan
                                                        Sekarang</button>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
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
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Aleandra
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
@endsection
