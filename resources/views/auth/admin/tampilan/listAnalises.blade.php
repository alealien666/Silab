@extends('auth.admin.layout.app')
@section('title', 'List Analises')
@section('menu', 'List Analises')
@section('submenu', 'Admin')

<style>
    #myTable_filter label input[type="search"] {
        padding: 8px 20px;
        font-size: 14px;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">List Jenis Analises</h4>
                </div>
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm">
                                <div>
                                    <button type="button" class="btn btn-warning add-btn" data-bs-toggle="modal"
                                        id="create-btn" data-bs-target="#addModal"><i
                                            class="ri-add-line align-bottom me-1"></i>Tambah Analises</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mb-1 mt-3">
                            <table class="table align-middle mb-0" id="myTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" data-sort="no">No</th>
                                        <th class="text-center" data-sort="kategori">kategori</th>
                                        <th class="text-center" data-sort="jenis_pengujian">Jenis pengujian</th>
                                        <th class="text-center" data-sort="jenis_analisa">Jenis Analisa</th>
                                        <th class="text-center" data-sort="harga">Harga</th>
                                        <th class="text-center" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listAnalises as $index => $list)
                                        <tr>
                                            <th class="text-center">{{ $index + 1 }}</th>
                                            <td class="text-center">{{ $list->category }}</td>
                                            <td class="text-center">{{ $list->jenis_pengujian }}</td>
                                            <td class="text-center">{{ $list->jenis_analisa }}</td>
                                            <td class="text-center">{{ $list->harga }}</td>
                                            <td class="text-center d-flex">
                                                <button class="btn btn-md btn-success edit-item-btn me-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $list->id_analises }}"><i
                                                        class="bi bi-pencil-fill"></i></button>
                                                <button class="btn btn-md btn-danger remove-item-btn" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $list->id_analises }}"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Analises</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form method="POST" action="{{ route('Admin.list-analises.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kategori">Pilih Kategori</label>
                            <select class="form-select" id="kategori" name="kategori">
                                <option selected>Pilih Kategori</option>
                                @foreach ($listKategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_analisa" class="form-label">Pilih Jenis Analisa</label>
                            <select class="form-select" id="jenis_analisa" name="jenis_analisa">
                                <option selected>Pilih Jenis Analisa</option>
                                <option value="Kualitatif">Kualitatif</option>
                                <option value="Kuantitatif">Kuantitatif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pengujian" class="form-label">Masukkan Jenis Pengujian</label>
                            <input type="text" name="jenis_pengujian" id="jenis_pengujian" class="form-control" required
                                autocomplete="off" />
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Masukkan Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" required
                                autocomplete="off" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($listAnalises as $list)
        {{-- update modal --}}
        <div class="modal fade" id="editModal{{ $list->id_analises }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Analises</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <form method="POST" action="{{ route('Admin.list-analises.update', $list->id_analises) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kategori">Pilih Kategori</label>
                                <select class="form-select" id="kategori" name="kategori">
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($listKategori as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($data->category === $list->category) selected @endif>
                                            {{ $data->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_analisa" class="form-label">Pilih Jenis Analisa</label>
                                <select class="form-select" id="jenis_analisa" name="jenis_analisa">
                                    <option selected>Pilih Jenis Analisa</option>
                                    <option value="Kualitatif" @if ($list->jenis_analisa === 'Kualitatif') selected @endif>
                                        Kualitatif
                                    </option>
                                    <option value="Kuantitatif" @if ($list->jenis_analisa === 'Kuantitatif') selected @endif>
                                        Kuantitatif
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_pengujian" class="form-label">Masukkan Jenis Pengujian</label>
                                <input type="text" name="jenis_pengujian" id="jenis_pengujian" class="form-control"
                                    required autocomplete="off" value="{{ $list->jenis_pengujian }}" />
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Masukkan Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" required
                                    autocomplete="off" value="{{ $list->harga }}" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- delete modal --}}
        <div class="modal fade zoomIn" id="deleteModal{{ $list->id_analises }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Anda Yakin ?</h4>
                                <p class="text-muted mx-4 mb-0">Anda Yakin Mau Menghapus Data Ini ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('Admin.list-analises.destroy', $list->id_analises) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn w-sm btn-danger "
                                    id="delete-record{{ $list->id_analises }}">Ya, Hapus!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © silab.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Tefa Polije
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
