@extends('auth.admin.layout.app')
@section('title', 'List Pemesanan')
@section('menu', 'List Pemesanan')
@section('submenu', 'Admin')

<style>
    .list1 {
        display: flex;
        justify-content: space-between;
        list-style: none;
        padding: 0;
    }

    .item1 {
        flex: 1;
        text-align: start;
    }

    .item1:last-child {
        text-align: end;
    }

    #listTotal {
        max-height: 150px;
        overflow-y: scroll;
    }

    #labelUpload {
        height: 150px;
        width: 100%;
        border-radius: 6px;
        border: 3px dashed #999;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- list tabs -->
                    <ul class="nav nav-tabs mb-3" id="myTabs" role="tablist">
                        {{-- <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#product1" role="tab"
                                aria-selected="false">
                                All Order
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#product2" role="tab"
                                aria-selected="false">
                                Sewa Lab
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#product3" role="tab" aria-selected="false">
                                Analisis
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#product4" role="tab" aria-selected="false">
                                Pending
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#product5" role="tab" aria-selected="false">
                                Approved
                            </a>
                        </li>
                    </ul>

                    <!-- list Tab panes -->
                    <div class="tab-content text-muted">
                        {{-- tab-all --}}
                        {{-- <div class="tab-pane active" id="product1" role="tabpanel">
                            <div class="card-body">
                                <div id="customerList">
                                    <div class="table-responsive mb-1" id="tab1">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center" data-sort="status">status</th>
                                                    <th class="text-center" data-sort="id_pemesanan">No Pemesanan</th>
                                                    <th class="text-center" data-sort="id_pemesanan">Tanggal</th>
                                                    <th class="text-center" data-sort="nama_pemesan">Nama Pemesan</th>
                                                    <th class="text-center" data-sort="jenis_pesanan">Jenis Pesanan</th>
                                                    <th class="text-center" data-sort="no_telpn">No Telpn</th>
                                                    <th class="text-center" data-sort="verifikasi">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPemesanan as $index => $list)
                                                    <tr>
                                                        @if ($list->status === 'pending')
                                                            <td class="text-center text-warning">
                                                                <span class="badge badge-soft-warning text-uppercase">
                                                                    {{ $list->status }}
                                                                </span>
                                                            </td>
                                                        @elseif($list->status === 'approved')
                                                            <td class="text-center text-success">
                                                                <span class="badge badge-soft-success text-uppercase">
                                                                    {{ $list->status }}
                                                                </span>
                                                            </td>
                                                        @endif
                                                        <td class="text-center">{{ $list->id_pemesanan }}</td>
                                                        <td class="text-center">{{ $list->order }}</td>
                                                        <td class="text-center">{{ $list->nama_pemesan }}</td>
                                                        <td class="text-center">{{ $list->jenis_pesanan }}</td>
                                                        <td class="text-center">{{ $list->no_telp }}</td>
                                                        @if ($list->status === 'pending')
                                                            <td class="text-center">
                                                                <button class="btn btn-md btn-warning edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalCheck{{ $list->id_pemesanan }}">check</button>
                                                            </td>
                                                        @elseif($list->status === 'approved')
                                                            <td class="text-center">
                                                                <button class="btn btn-md btn-success edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalCheck{{ $list->id_pemesanan }}">detail</button>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                     
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- tab sewa lab --}}
                        <div class="tab-pane active" id="product2" role="tabpanel">
                            <div class="card-body">
                                <div id="customerList">
                                    <div class="table-responsive mb-1" id="tab2">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center" data-sort="status">status</th>
                                                    <th class="text-center" data-sort="id_pemesanan">No Pemesanan</th>
                                                    <th class="text-center" data-sort="id_pemesanan">Tanggal</th>
                                                    <th class="text-center" data-sort="nama_pemesan">Nama Pemesan</th>
                                                    <th class="text-center" data-sort="jenis_pesanan">Jenis Pesanan</th>
                                                    <th class="text-center" data-sort="no_telpn">No Telpn</th>
                                                    <th class="text-center" data-sort="verifikasi">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPemesanan as $index => $list)
                                                    @if ($list->jenis_pesanan === 'Sewa Lab')
                                                        <tr>
                                                            @if ($list->status === 'pending')
                                                                <td class="text-center text-warning">
                                                                    <span class="badge badge-soft-warning text-uppercase">
                                                                        {{ $list->status }}
                                                                    </span>
                                                                </td>
                                                            @elseif($list->status === 'approved')
                                                                <td class="text-center text-success">
                                                                    <span class="badge badge-soft-success text-uppercase">
                                                                        {{ $list->status }}
                                                                    </span>
                                                                </td>
                                                            @endif
                                                            <td class="text-center">{{ $list->id_pemesanan }}</td>
                                                            <td class="text-center">{{ $list->order }}</td>
                                                            <td class="text-center">{{ $list->nama_pemesan }}</td>
                                                            <td class="text-center">{{ $list->jenis_pesanan }}</td>
                                                            <td class="text-center">{{ $list->no_telp }}</td>
                                                            @if ($list->status === 'pending')
                                                                <td class="text-center">
                                                                    <button class="btn btn-md btn-warning edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalCheck{{ $list->id_pemesanan }}">check</button>
                                                                </td>
                                                            @elseif($list->status === 'approved')
                                                                <td class="text-center">
                                                                    <button class="btn btn-md btn-success edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalCheck{{ $list->id_pemesanan }}">detail</button>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div class="noresult">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#405189,secondary:#0ab39c"
                                                    style="width: 75px; height: 75px">
                                                </lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted">
                                                    We've searched more than 150+ Orders We did not
                                                    find any orders for you search.
                                                </p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- tab analisis --}}
                        <div class="tab-pane active" id="product3" role="tabpanel">
                            <div class="card-body">
                                <div id="customerList">
                                    <div class="table-responsive mb-1" id="tab3">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center" data-sort="status">status</th>
                                                    <th class="text-center" data-sort="id_pemesanan">No Pemesanan</th>
                                                    <th class="text-center" data-sort="id_pemesanan">Tanggal</th>
                                                    <th class="text-center" data-sort="nama_pemesan">Nama Pemesan</th>
                                                    <th class="text-center" data-sort="jenis_pesanan">Jenis Pesanan</th>
                                                    <th class="text-center" data-sort="no_telpn">No Telpn</th>
                                                    <th class="text-center" data-sort="verifikasi">Action</th>
                                                    <th class="text-center" data-sort="verifikasi">Entri Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPemesanan as $index => $list)
                                                    @if ($list->jenis_pesanan === 'Jasa Analisis')
                                                        <tr>
                                                            @if ($list->status === 'pending')
                                                                <td class="text-center text-warning">
                                                                    <span class="badge badge-soft-warning text-uppercase">
                                                                        {{ $list->status }}
                                                                    </span>
                                                                </td>
                                                            @elseif($list->status === 'approved')
                                                                <td class="text-center text-success">
                                                                    <span class="badge badge-soft-success text-uppercase">
                                                                        {{ $list->status }}
                                                                    </span>
                                                                </td>
                                                            @endif
                                                            <td class="text-center">{{ $list->id_pemesanan }}</td>
                                                            <td class="text-center">{{ $list->order }}</td>
                                                            <td class="text-center">{{ $list->nama_pemesan }}</td>
                                                            <td class="text-center">{{ $list->jenis_pesanan }}</td>
                                                            <td class="text-center">{{ $list->no_telp }}</td>
                                                            @if ($list->status === 'pending')
                                                                <td class="text-center">
                                                                    <button class="btn btn-md btn-warning edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalCheck{{ $list->id_pemesanan }}">check</button>
                                                                </td>
                                                            @elseif($list->status === 'approved')
                                                                <td class="text-center">
                                                                    <button class="btn btn-md btn-success edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalCheck{{ $list->id_pemesanan }}">detail</button>
                                                                </td>
                                                            @endif
                                                            <td><button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop{{ $list->id_pemesanan }}">
                                                                    Hasil
                                                                </button></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- tab-Pending --}}
                        <div class="tab-pane" id="product4" role="tabpanel">
                            <div class="card-body">
                                <div id="customerList">
                                    <div class="table-responsive mb-1" id="tab4">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center" data-sort="status">status</th>
                                                    <th class="text-center" data-sort="id_pemesanan">No Pemesanan</th>
                                                    <th class="text-center" data-sort="id_pemesanan">Tanggal</th>
                                                    <th class="text-center" data-sort="nama_pemesan">Nama Pemesan</th>
                                                    <th class="text-center" data-sort="jenis_pesanan">Jenis Pesanan</th>
                                                    <th class="text-center" data-sort="no_telpn">No Telpn</th>
                                                    <th class="text-center" data-sort="verifikasi">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPemesanan as $index => $list)
                                                    @if ($list->status === 'pending')
                                                        <tr>
                                                            <td class="text-center text-warning">
                                                                <span class="badge badge-soft-warning text-uppercase">
                                                                    {{ $list->status }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">{{ $list->id_pemesanan }}</td>
                                                            <td class="text-center">{{ $list->order }}</td>
                                                            <td class="text-center">{{ $list->nama_pemesan }}</td>
                                                            <td class="text-center">{{ $list->jenis_pesanan }}</td>
                                                            <td class="text-center">{{ $list->no_telp }}</td>
                                                            <td class="text-center">
                                                                <button class="btn btn-md btn-warning edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalCheck{{ $list->id_pemesanan }}">check</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- tab-Approved --}}
                        <div class="tab-pane" id="product5" role="tabpanel">
                            <div class="card-body">
                                <div id="customerList">
                                    <div class="table-responsive mb-1" id="tab5">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center" data-sort="status">status</th>
                                                    <th class="text-center" data-sort="id_pemesanan">No Pemesanan</th>
                                                    <th class="text-center" data-sort="id_pemesanan">Tanggal</th>
                                                    <th class="text-center" data-sort="nama_pemesan">Nama Pemesan</th>
                                                    <th class="text-center" data-sort="jenis_pesanan">Jenis Pesanan</th>
                                                    <th class="text-center" data-sort="no_telpn">No Telpn</th>
                                                    <th class="text-center" data-sort="verifikasi">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPemesanan as $index => $list)
                                                    @if ($list->status === 'approved')
                                                        <tr>
                                                            <td class="text-center text-success">
                                                                <span class="badge badge-soft-success text-uppercase">
                                                                    {{ $list->status }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">{{ $list->id_pemesanan }}</td>
                                                            <td class="text-center">{{ $list->order }}</td>
                                                            <td class="text-center">{{ $list->nama_pemesan }}</td>
                                                            <td class="text-center">{{ $list->jenis_pesanan }}</td>
                                                            <td class="text-center">{{ $list->no_telp }}</td>
                                                            <td class="text-center">
                                                                <button class="btn btn-md btn-success edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalCheck{{ $list->id_pemesanan }}">detail</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
    </div>

    {{-- modal hasil --}}
    @foreach ($listPemesanan as $list)
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal fade" id="staticBackdrop{{ $list->id_pemesanan }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('hasilAnalisis', $list->id_pemesanan) }}" method="post">
                                @csrf
                                @foreach ($list['analis'] as $key => $analis)
                                    <label for="jenis">Jenis Analisis</label>
                                    <input class="form-control" type="text" name="jenis"
                                        value="{{ $analis->jenis_pengujian }}" id="jenis">
                                    <label for="status" class="mt-3">Status</label>
                                    <input class="form-control" type="text" name="status">
                                    <label for="kondisi" class="mt-3">Kondisi Sample</label>
                                    <input type="text"class="form-control" name="kondisi" id="kondisi">
                                @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end --}}

    {{-- modal check --}}
    @foreach ($listPemesanan as $list)
        <div id="modalCheck{{ $list->id_pemesanan }}" class="modal zoomIn" tabindex="-1"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg bg-light">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Verifikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <form action="{{ route('riwayat-pemesanan.verifikasi', $list->id_pemesanan) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <img class="img-preview col-md-12"
                                            src="{{ asset('img/bukti-pembayaran/' . basename($list->bukti_pembayaran)) }}">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="card border card-border-primary">
                                        <div class="card-header">
                                            @if ($list->status === 'pending')
                                                <span
                                                    class="badge badge-soft-warning align-middle fs-10 float-end">{{ $list->status }}
                                                </span>
                                            @else
                                                <span
                                                    class="badge badge-soft-success align-middle fs-10 float-end">{{ $list->status }}
                                                </span>
                                            @endif
                                            <h6 class="card-title mb-0">Detail Pemesanan</h6>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                Tanggal Pesan &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;
                                                <b> {{ $list->order }} </b>
                                                <br>
                                                Nama Pemesan &nbsp; : &nbsp;&nbsp;&nbsp;
                                                <b> {{ $list->nama_pemesan }} </b>
                                                <br>
                                                @if ($list->jenis_pesanan === 'Sewa Lab')
                                                    Nama Lab &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;
                                                    @foreach ($list['labs'] as $key => $labs)
                                                        <b> {{ $labs->nama_lab }} </b>
                                                    @endforeach
                                                @else
                                                    Jenis Pengujian &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;
                                                    @foreach ($list['analis'] as $key => $analis)
                                                        <b> {{ $analis->jenis_pengujian }} </b>
                                                    @endforeach
                                                @endif
                                            </p>
                                            <input type="hidden" name="status" value="approved">
                                            @if ($list->jenis_pesanan === 'Sewa Lab')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="list-header">
                                                            <b>List Jenis Alat &nbsp;&nbsp;&nbsp; :</b>
                                                        </div>
                                                        <hr>
                                                        <ul class="list-content mx-0" id="listTotal">
                                                            <li class="list-unstyled" id="listItem">
                                                                @foreach ($list['alat'] as $key => $alat)
                                                                    <ul class="list-inline list1 bg-{{ $key % 2 == 0 ? '' : 'light' }}"
                                                                        style="margin-left: -30px;">
                                                                        <li class="list-inline-item item1 text-capitalize">
                                                                            {{ $alat->jenis_alat }}
                                                                        </li>
                                                                        <li class="list-inline-item item1 text-capitalize">
                                                                            {{ $alat->harga }}
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="text-end">
                                                total pembayaran : &nbsp;&nbsp;&nbsp;{{ $list->total_biaya }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        @if ($list->status === 'pending')
                                            <button type="submit" name="submit"
                                                class="btn btn-primary">Verifikasi</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <script>
        // datatables pada setiap tab
        $(document).ready(function() {
            $('#tab1 table').DataTable();
            $('#tab2 table').DataTable();
            $('#tab3 table').DataTable();
            $('#tab4 table').DataTable();
            $('#tab5 table').DataTable();

        });

        // belum tepat
        function previewImage() {
            const photo = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');
            const pesan = document.querySelector('#pesan');

            // console.log(id);

            pesan.style.display = 'none';
            imgPreview.style.display = 'block';

            //data gambar
            const oFReader = new FileReader();
            oFReader.readAsDataURL(photo.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
