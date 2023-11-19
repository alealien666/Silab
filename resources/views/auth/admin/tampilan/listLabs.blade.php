@extends('auth.admin.layout.app')
@section('title', 'List Labs')
@section('menu', 'List Labs')
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
                    <h4 class="card-title mb-0">List Labs</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm">
                                <div>
                                    <button type="button" class="btn btn-warning add-btn" data-bs-toggle="modal"
                                        id="create-btn" data-bs-target="#addModal"><i
                                            class="ri-add-line align-bottom me-1"></i> Tambah Labs</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mb-1 mt-3">
                            <table class="table align-middle mb-0" id="myTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" data-sort="no">No</th>
                                        <th class="text-center" data-sort="kategori">Kategori</th>
                                        <th class="text-center" data-sort="nama_labs">Nama Labs</th>
                                        <th class="text-center" data-sort="foto">foto</th>
                                        <th class="text-center" data-sort="kapasitas">Kapasitas</th>
                                        <th class="text-center" data-sort="deskripsi">deskripsi</th>
                                        <th class="text-center" data-sort="action">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($listLabs) --}}
                                    @foreach ($listLabs as $index => $list)
                                        <tr>
                                            <th class="text-center">{{ $index + 1 }}</th>
                                            <td class="text-center">{{ $list->category }}</td>
                                            <td class="text-center">{{ $list->nama_lab }}</td>
                                            <td style="width: 150px;" class="text-center">
                                                <img width="200px" height="120px"
                                                    src="{{ asset('img/foto-labs/' . basename($list->foto)) }}"
                                                    alt="">
                                            </td>
                                            <td class="text-center">{{ $list->kapasitas }}</td>
                                            <td class="text-center">{{ $list->deskripsi_lab }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-md btn-success edit-item-btn" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal{{ $list->id_lab }}">edit</button>
                                                <button class="btn btn-md btn-danger remove-item-btn" data-bs-toggle="modal"
                                                    data-bs-target="#deleteJenis{{ $list->id_lab }}">hapus</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Labs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form method="POST" action="{{ route('Admin.list-labs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_lab" class="form-label">Masukkan Nama Lab</label>
                            <input type="text" name="nama_lab" id="nama_lab" class="form-control" required
                                autocomplete="off" />
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="kategori">Pilih Kategori</label>
                                    <select class="form-select" id="kategori" name="kategori">
                                        <option selected>Pilih Kategori</option>
                                        @foreach ($listKategori as $data)
                                            <option value="{{ $data->id }}">{{ $data->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="kapasitas" class="form-label">Masukkan Kapasitas</label>
                            <input type="number" name="kapasitas" id="kapasitas" class="form-control" required
                                autocomplete="off" />
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Masukkan Foto</label>
                            <img class="img-preview img-fluid mb-3 col-md-6">
                            <input type="file" onchange="previewImage()" name="foto" id="foto"
                                class="form-control" autocomplete="off" />
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Masukkan Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
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

    @foreach ($listLabs as $list)
        {{-- update modal --}}
        <div class="modal fade" id="updateModal{{ $list->id_lab }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Labs</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <form method="POST" action="{{ route('Admin.list-labs.update', $list->id_lab) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_lab" class="form-label">Masukkan Nama Lab</label>
                                <input value="{{ $list->nama_lab }}" type="text" name="nama_lab" id="nama_lab"
                                    class="form-control" required autocomplete="off" />
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="kapasitas" class="form-label">Masukkan Kapasitas</label>
                                <input value="{{ $list->kapasitas }}" type="number" name="kapasitas" id="kapasitas"
                                    class="form-control" required autocomplete="off" />
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Masukkan Foto</label>
                                <input type="hidden" name="oldImage" value="{{ $list->foto }}">
                                @if ($list->foto)
                                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                                        src="{{ asset('img/foto-labs/' . basename($list->foto)) }}" alt="Preview Image">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-md-6">
                                @endif
                                <input type="file" onchange="previewImage()" name="foto" id="foto"
                                    class="form-control" autocomplete="off" value="{{ old(basename($list->foto)) }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Masukkan Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $list->deskripsi_lab }}</textarea>
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

        {{-- delete modal --}}
        <div class="modal fade zoomIn" id="deleteJenis{{ $list->id_lab }}" tabindex="-1" aria-hidden="true">
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
                            <form action="{{ route('Admin.list-labs.destroy', $list->id_lab) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn w-sm btn-danger "
                                    id="delete-record{{ $list->id_lab }}">Ya, Hapus!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- review image --}}
    <script>
        function previewImage() {
            const photo = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

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
