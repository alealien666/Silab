@include('layouts.silab')
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
                                    <li class="breadcrumb-item"><a href="/lab">Sewa Lab</a></li>
                                    <li class="breadcrumb-item active">Order</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body checkout-tab">

                                <form action="{{ route('orderLab') }}" method="post">
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
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fs-15 p-3" id="pills-bill-address-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-bill-address"
                                                    type="button" role="tab" aria-controls="pills-bill-address"
                                                    aria-selected="false"><i
                                                        class="ri-truck-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                                    Shipping Info</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                            aria-labelledby="pills-bill-info-tab">
                                            <div>
                                                <h5 class="mb-1">{{ $lab->nama_lab }}</h5>
                                                <input type="hidden" name="lab" id="lab"
                                                    value="{{ $lab->nama_lab }}">
                                                <input type="hidden" name="id_lab" value="{{ $lab->id }}">
                                                <p class="text-muted mb-4">Please fill all information below</p>
                                            </div>

                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="billinginfo-firstName"
                                                                class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama" placeholder="Enter name" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="no-telp" class="form-label">No Telp</label>
                                                            <input type="number" class="form-control" name="notelp"
                                                                id="no-telp" placeholder="No Telp" value="">
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
                                                                id="jenis" value="Sewa Lab" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="order" class="form-label">Order</label>
                                                            <input type="date" name="masuk" id="masuk"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start m-2">
                                                <button type="submit"
                                                    class="btn btn-primary btn-label right ms-auto nexttab"
                                                    data-nexttab="pills-bill-address-tab"><i
                                                        class="ri-truck-line label-icon align-middle fs-16 ms-2"
                                                        onclick="savePersonalInfo()"></i>Pesan
                                                    Sekarang</button>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->

                                        <div class="tab-pane fade" id="pills-bill-address" role="tabpanel"
                                            aria-labelledby="pills-bill-address-tab">
                                            <div>
                                                <h5 class="mb-1">Shipping Information</h5>
                                                <p class="text-muted mb-4">Please fill all information below</p>
                                            </div>

                                            <div class="mt-5">
                                                <div class="row gy-3">
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="shippingAddress01">
                                                                <span
                                                                    class="mb-4 fw-semibold d-block">{{ auth()->user()->email }}</span><br>
                                                                <span
                                                                    class="text-muted fw-normal text-wrap mb-1 d-block"
                                                                    id="shipping-name">Nama :
                                                                    {{ session('personal_info.nama') }}</span>
                                                                <span
                                                                    class="text-muted fw-normal text-wrap mb-1 d-block"
                                                                    id="shipping-lab">Nama Lab :
                                                                    {{ session('personal_info.lab') }}</span>
                                                                <span
                                                                    class="text-muted fw-normal text-wrap mb-1 d-block"
                                                                    id="shipping-notelp">No Telp :
                                                                    {{ session('personal_info.notelp') }}</span>
                                                                <span
                                                                    class="text-muted fw-normal text-wrap mb-1 d-block"
                                                                    id="shipping-jenispesanan">Jenis Pesanan :
                                                                    {{ session('personal_info.jenispesanan') }}</span>
                                                                <span
                                                                    class="text-muted fw-normal text-wrap mb-1 d-block"
                                                                    id="shipping-masuk">Tanggal Masuk :
                                                                    {{ session('personal_info.masuk') }}</span>
                                                            </label>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-check" id="scroll">
                                                            <label class="form-check-label" for="shippingAddress02">
                                                                <span
                                                                    class="mb-4 fw-semibold d-block text-uppercase">daftar
                                                                    alat yang di sewa</span><br>
                                                                @foreach ($selectedAlat as $item)
                                                                    <span class="text-muted mb-2 d-block"
                                                                        id="shipping-alat">
                                                                        Nama Alat: {{ $item->jenis_alat }}<br>
                                                                        Harga: Rp. {{ $item->harga }}<br>
                                                                        {{-- Jumlah: {{ $item->jumlah }} --}}
                                                                    </span>
                                                                    <hr>
                                                                @endforeach
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <h5 class="fs-14 mb-3">Total Bayar</h5>
                                                    <div class="row g-4">
                                                        <div class="col-lg-6">
                                                            <div class="form-check card-radio">
                                                                <label class="form-check-label"
                                                                    for="shippingMethod02">
                                                                    <span
                                                                        class="fs-21 float-end mt-2 text-wrap d-block fw-semibold"
                                                                        id="totalHarga"></span>
                                                                    <span class="fs-15 mb-1 text-wrap d-block">Express
                                                                        Delivery</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap d-block">Expired
                                                                        In 10 minutes</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-start gap-3 mt-4">
                                                <button type="button" class="btn btn-light btn-label previestab"
                                                    data-previous="pills-bill-info-tab"><i
                                                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back
                                                    to Personal Info</button>
                                                <button type="button"
                                                    class="btn btn-primary btn-label right ms-auto nexttab"
                                                    data-nexttab="pills-payment-tab"><i
                                                        class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Continue
                                                    to Payment</button>
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

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Pilihan Alat</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card"
                                    style="max-height: 300px; overflow-y: scroll">
                                    <table class="table table-borderless align-middle mb-0">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col">Jenis Alat</th>
                                                <th scope="col" class="text-start" colspan="2">Harga</th>
                                                <th scope="col">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alat as $alat)
                                                @if ($alat->jumlah === 0)
                                                    <tr id="selected_alat" style="pointer-events: none; opacity:0.5;">
                                                        <td>
                                                            <h5 class="fs-15">
                                                                <p class="text-dark" name="nama_alat">
                                                                    {{ $alat->jenis_alat }}</p>
                                                            </h5>
                                                        </td>
                                                        <td class="text-end" name="harga_alat">{{ $alat->harga }}
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="selected_alat[]"
                                                                value="{{ $alat->id }}"
                                                                data-harga="{{ $alat->harga }}" disabled>
                                                        </td>
                                                        <td>
                                                            <div class="jumlah diss">
                                                                <button type="button" class="min"><i
                                                                        class="bi bi-dash-lg"></i></button>
                                                                <input type="hidden" name="jumlah_alat[]"
                                                                    value="0">
                                                                <span class="count">0</span>
                                                                <button type="button" class="plus"><i
                                                                        class="bi bi-plus-lg"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr id="selected_alat">
                                                        <td>
                                                            <h5 class="fs-15">
                                                                <p class="text-dark" name="nama_alat">
                                                                    {{ $alat->jenis_alat }}</p>
                                                            </h5>
                                                        </td>
                                                        <td class="text-end" name="harga_alat">{{ $alat->harga }}
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="selected_alat[]"
                                                                value="{{ $alat->id }}"
                                                                data-harga="{{ $alat->harga }}">
                                                        </td>
                                                        <td>
                                                            <div class="jumlah">
                                                                <button type="button" class="min"><i
                                                                        class="bi bi-dash-lg"></i></button>
                                                                <input type="hidden" name="jumlah_alat[]"
                                                                    value="0">
                                                                <span class="count">0</span>
                                                                <button type="button" class="plus"><i
                                                                        class="bi bi-plus-lg"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive table-card pt-4">
                                    <table class="table table-borderless align-middle mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="fw-semibold" colspan="2">Sub Total :</td>
                                                <td class="fw-semibold text-end" id="subtotal"></td>
                                            </tr>
                                            <tr class="table-active">
                                                <th colspan="2">Total (Rp) :</th>
                                                <td class="text-end fw-semibold" name="totalHarga" id="total">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        </form>

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
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- removeItemModal -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    function savePersonalInfo() {
        // Simpan data Personal Info ke variabel JavaScript
        let nama = document.getElementById('nama').value;
        let lab = document.getElementById('lab').value;
        let notelp = document.getElementById('no-telp').value;
        let jenis = document.getElementById('jenis').value;
        let masuk = document.getElementById('masuk').value;
        let keluar = document.getElementById('keluar').value;
        let total = document.getElementById('total')
        let totalHarga = document.getElementById('total').textContent;
        const checkboxes = document.querySelectorAll('input[name="selected_alat[]"]:checked');

        checkboxes.forEach(checkbox => {
            checkbox.disabled = true;
        });


        // isi data Shipping Info
        document.getElementById('totalHarga').textContent = totalHarga;
        document.getElementById('shipping-nama').value = nama;
        document.getElementById('shipping-lab').value = lab;
        document.getElementById('shipping-notelp').value = notelp;
        document.getElementById('shipping-jenispesanan').value = jenis;
        document.getElementById('shipping-masuk').value = masuk;
        document.getElementById('shipping-keluar').value = keluar;
        document.getElementById('totalHarga').value = total;

        //  Menampilkan Shipping Info dan menyembunyikan Personal Info
        const personal = document.getElementById('personal-info')
        personal.disabled = true
        document.getElementById('shipping-info')
    }
</script>
