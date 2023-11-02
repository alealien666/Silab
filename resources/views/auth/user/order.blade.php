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
                                            <li class="nav-item" role="presentation">
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
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fs-15 p-3" id="pills-payment-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-payment" type="button"
                                                    role="tab" aria-controls="pills-payment"
                                                    aria-selected="false"><i
                                                        class="ri-bank-card-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                                    Payment Info</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fs-15 p-3" id="pills-finish-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-finish" type="button"
                                                    role="tab" aria-controls="pills-finish" aria-selected="false"><i
                                                        class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                            aria-labelledby="pills-bill-info-tab">
                                            <div>
                                                <h5 class="mb-1">{{ $lab->nama_lab }}</h5>
                                                <input type="hidden" name="id_lab" value="{{ $lab->id }}">
                                                <p class="text-muted mb-4">Please fill all information below</p>
                                            </div>

                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="billinginfo-firstName"
                                                                class="form-label">Nama</label>
                                                            <input type="text" class="form-control"
                                                                id="billinginfo-firstName" name="nama"
                                                                placeholder="Enter name" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="no-telp" class="form-label">No Telp</label>
                                                            <input type="number" class="form-control" name="notelp"
                                                                id="billinginfo-lastName" placeholder="No Telp"
                                                                value="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="billinginfo-email"
                                                                class="form-label">Email</label>
                                                            <input type="email" class="form-control"
                                                                id="billinginfo-email"
                                                                value="{{ auth()->user()->email }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="billinginfo-phone" class="form-label">Jenis
                                                                Pesanan</label>
                                                            <input type="text" class="form-control" name="jenis"
                                                                id="billinginfo-phone" value="Sewa Lab" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="order" class="form-label">Tanggal
                                                                Masuk</label>
                                                            <input type="date" name="masuk"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="checkout" class="form-label">Tanggal
                                                                Keluar</label>
                                                            <input type="date" class="form-control"
                                                                name="keluar">
                                                        </div>
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
                                        <!-- end tab pane -->

                                        <div class="tab-pane fade" id="pills-bill-address" role="tabpanel"
                                            aria-labelledby="pills-bill-address-tab">
                                            <div>
                                                <h5 class="mb-1">Shipping Information</h5>
                                                <p class="text-muted mb-4">Please fill all information below</p>
                                            </div>

                                            <div class="mt-4">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-15 mb-0">Saved Address</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-sm btn-success mb-3"
                                                            data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                                            Add Address
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row gy-3">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-check card-radio">
                                                            <input id="shippingAddress01" name="shippingAddress"
                                                                type="radio" class="form-check-input" checked>
                                                            <label class="form-check-label" for="shippingAddress01">
                                                                <span
                                                                    class="mb-4 fw-semibold d-block text-muted text-uppercase">Home
                                                                    Address</span>

                                                                <span class="fs-15 mb-2 d-block">Marcus
                                                                    Alfaro</span>
                                                                <span
                                                                    class="text-muted fw-normal text-wrap mb-1 d-block">4739
                                                                    Bubby Drive Austin, TX 78729</span>
                                                                <span class="text-muted fw-normal d-block">Mo.
                                                                    012-345-6789</span>
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                                            <div>
                                                                <a href="#" class="d-block text-body p-1 px-2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#addAddressModal"><i
                                                                        class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                                    Edit</a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="d-block text-body p-1 px-2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#removeItemModal"><i
                                                                        class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                                    Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-check card-radio">
                                                            <input id="shippingAddress02" name="shippingAddress"
                                                                type="radio" class="form-check-input">
                                                            <label class="form-check-label" for="shippingAddress02">
                                                                <span
                                                                    class="mb-4 fw-semibold d-block text-muted text-uppercase">Office
                                                                    Address</span>

                                                                <span class="fs-15 mb-2 d-block">James Honda</span>
                                                                <span
                                                                    class="text-muted fw-normal text-wrap mb-1 d-block">1246
                                                                    Virgil Street Pensacola, FL 32501
                                                                </span>
                                                                <span class="text-muted fw-normal d-block">Mo.
                                                                    012-345-6789</span>
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                                            <div>
                                                                <a href="#" class="d-block text-body p-1 px-2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#addAddressModal"><i
                                                                        class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                                    Edit</a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="d-block text-body p-1 px-2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#removeItemModal"><i
                                                                        class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                                    Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <h5 class="fs-14 mb-3">Shipping Method</h5>

                                                    <div class="row g-4">
                                                        <div class="col-lg-6">
                                                            <div class="form-check card-radio">
                                                                <input id="shippingMethod01" name="shippingMethod"
                                                                    type="radio" class="form-check-input" checked>
                                                                <label class="form-check-label"
                                                                    for="shippingMethod01">
                                                                    <span
                                                                        class="fs-21 float-end mt-2 text-wrap d-block fw-semibold">Free</span>
                                                                    <span class="fs-15 mb-1 text-wrap d-block">Free
                                                                        Delivery</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap d-block">Expected
                                                                        Delivery 3 to 5 Days</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check card-radio">
                                                                <input id="shippingMethod02" name="shippingMethod"
                                                                    type="radio" class="form-check-input" checked>
                                                                <label class="form-check-label"
                                                                    for="shippingMethod02">
                                                                    <span
                                                                        class="fs-21 float-end mt-2 text-wrap d-block fw-semibold">$24.99</span>
                                                                    <span class="fs-15 mb-1 text-wrap d-block">Express
                                                                        Delivery</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap d-block">Delivery
                                                                        within 24hrs.</span>
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

                                        <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                            aria-labelledby="pills-payment-tab">
                                            <div>
                                                <h5 class="mb-1">Payment Selection</h5>
                                                <p class="text-muted mb-4">Please select and enter your billing
                                                    information</p>
                                            </div>

                                            <div class="row g-4">
                                                <div class="col-lg-4 col-sm-6">
                                                    <div data-bs-toggle="collapse"
                                                        data-bs-target="#paymentmethodCollapse.show"
                                                        aria-expanded="false" aria-controls="paymentmethodCollapse">
                                                        <div class="form-check card-radio">
                                                            <input id="paymentMethod01" name="paymentMethod"
                                                                type="radio" class="form-check-input">
                                                            <label class="form-check-label" for="paymentMethod01">
                                                                <span class="fs-16 text-muted me-2"><i
                                                                        class="ri-paypal-fill align-bottom"></i></span>
                                                                <span class="fs-15 text-wrap">Paypal</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <div data-bs-toggle="collapse"
                                                        data-bs-target="#paymentmethodCollapse" aria-expanded="true"
                                                        aria-controls="paymentmethodCollapse">
                                                        <div class="form-check card-radio">
                                                            <input id="paymentMethod02" name="paymentMethod"
                                                                type="radio" class="form-check-input" checked>
                                                            <label class="form-check-label" for="paymentMethod02">
                                                                <span class="fs-16 text-muted me-2"><i
                                                                        class="ri-bank-card-fill align-bottom"></i></span>
                                                                <span class="fs-15 text-wrap">Credit / Debit
                                                                    Card</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-sm-6">
                                                    <div data-bs-toggle="collapse"
                                                        data-bs-target="#paymentmethodCollapse.show"
                                                        aria-expanded="false" aria-controls="paymentmethodCollapse">
                                                        <div class="form-check card-radio">
                                                            <input id="paymentMethod03" name="paymentMethod"
                                                                type="radio" class="form-check-input">
                                                            <label class="form-check-label" for="paymentMethod03">
                                                                <span class="fs-16 text-muted me-2"><i
                                                                        class="ri-money-dollar-box-fill align-bottom"></i></span>
                                                                <span class="fs-15 text-wrap">Cash on
                                                                    Delivery</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="collapse show" id="paymentmethodCollapse">
                                                <div class="card p-4 border shadow-none mb-0 mt-4">
                                                    <div class="row gy-3">
                                                        <div class="col-md-12">
                                                            <label for="cc-name" class="form-label">Name on
                                                                card</label>
                                                            <input type="text" class="form-control" id="cc-name"
                                                                placeholder="Enter name">
                                                            <small class="text-muted">Full name as displayed on
                                                                card</small>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="cc-number" class="form-label">Credit card
                                                                number</label>
                                                            <input type="text" class="form-control" id="cc-number"
                                                                placeholder="xxxx xxxx xxxx xxxx">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label for="cc-expiration"
                                                                class="form-label">Expiration</label>
                                                            <input type="text" class="form-control"
                                                                id="cc-expiration" placeholder="MM/YY">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label for="cc-cvv" class="form-label">CVV</label>
                                                            <input type="text" class="form-control" id="cc-cvv"
                                                                placeholder="xxx">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted mt-2 fst-italic">
                                                    <i data-feather="lock" class="text-muted icon-xs"></i> Your
                                                    transaction is secured with SSL encryption
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-start gap-3 mt-4">
                                                <button type="button" class="btn btn-light btn-label previestab"
                                                    data-previous="pills-bill-address-tab"><i
                                                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back
                                                    to Shipping</button>
                                                <button type="button"
                                                    class="btn btn-primary btn-label right ms-auto nexttab"
                                                    data-nexttab="pills-finish-tab"><i
                                                        class="ri-shopping-basket-line label-icon align-middle fs-16 ms-2"></i>Complete
                                                    Order</button>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->

                                        <div class="tab-pane fade" id="pills-finish" role="tabpanel"
                                            aria-labelledby="pills-finish-tab">
                                            <div class="text-center py-5">

                                                <div class="mb-4">
                                                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json"
                                                        trigger="loop" colors="primary:#0ab39c,secondary:#405189"
                                                        style="width:120px;height:120px"></lord-icon>
                                                </div>
                                                <h5>Thank you ! Your Order is Completed !</h5>
                                                <p class="text-muted">You will receive an order confirmation email
                                                    with
                                                    details of your order.</p>

                                                <h3 class="fw-semibold">Order ID: <a
                                                        href="apps-ecommerce-order-details.html"
                                                        class="text-decoration-underline">VZ2451</a></h3>
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
                                    <table class="table table-borderless align-middle mb-0" style="">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th style="width: 80px;" scope="col">Foto</th>
                                                <th scope="col">Jenis Alat</th>
                                                <th scope="col" class="text-start" colspan="2">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alat as $alat)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-md bg-light rounded p-1">
                                                            <img src="{{ asset('img/ceret.jpeg') }}"
                                                                alt="{{ $alat->jenis_alat }}"
                                                                class="img-fluid d-block">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-15">
                                                            <p class="text-dark">{{ $alat->jenis_alat }}</p>
                                                        </h5>
                                                    </td>
                                                    <td class="text-end">{{ $alat->harga }}</td>
                                                    <td>
                                                        <input type="checkbox" name="selected_alat[]"
                                                            value="{{ $alat->id }}"
                                                            data-harga="{{ $alat->harga }}">
                                                    </td>
                                                </tr>
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
                                                <td class="text-end fw-semibold" id="total"></td>
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
