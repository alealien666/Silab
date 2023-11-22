@extends('auth.admin.layout.app')
@section('title', 'Manajemen User')

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
                                            class="ri-add-line align-bottom me-1"></i>Tambah User</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mb-1 mt-3">
                            <table class="table align-middle mb-0" id="myTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" data-sort="no">No</th>
                                        <th class="text-center" data-sort="kategori">Nama</th>
                                        <th class="text-center" data-sort="jenis_pengujian">Email</th>
                                        <th class="text-center" data-sort="jenis_analisa">Role</th>
                                        <th class="text-center" data-sort="harga">Avatar</th>
                                        <th class="text-center" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataUser as $key => $user)
                                        <tr>
                                            <th class="text-center">{{ $user->id }}</th>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td>{{ $role[$key] }}</td>
                                            </td>
                                            <td class="text-center"><img src="{{ asset($user->avatar) }}" alt=""
                                                    width="100px" height="100px">
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-md p-2 btn-success edit-item-btn"
                                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}"><i
                                                        class="bi bi-pencil-fill"></i></button>
                                                <button class="btn btn-md p-2 btn-danger remove-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $user->id }}"><i
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form method="POST" action="{{ route('Admin.user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="role">Pilih Role</label>
                            <select class="form-select" id="role" name="role">
                                <option selected>Pilih Role</option>
                                <option value="0">Super Admin</option>
                                <option value="1">Admin</option>
                                <option value="2">Pelanggan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukkan Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required
                                autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Masukkan Email</label>
                            <input type="email" name="email" id="email" class="form-control" required
                                autocomplete="off" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Masukkan Password</label>
                            <input type="password" name="password" id="password" class="form-control" required
                                autocomplete="off" />
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Pilih Avatar</label>
                            <img class="img-preview img-fluid mb-3 col-md-6">
                            <input type="file" onchange="previewImage()" name="avatar" id="avatar"
                                class="form-control" autocomplete="off" />
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

    {{-- update modal --}}
    @foreach ($dataUser as $user)
        <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <form method="POST" action="{{ route('Admin.user.update', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kategori">Pilih Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option selected>Pilih Role</option>
                                    <option value="0" @if ($user->role === 0) selected @endif>Super Admin
                                    </option>
                                    <option value="1" @if ($user->role === 1) selected @endif>Admin</option>
                                    <option value="2" @if ($user->role === 2) selected @endif>Pelanggan
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Masukkan Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required
                                    autocomplete="off" value="{{ $user->name }}" />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Masukkan Email</label>
                                <input type="email" name="email" id="email" class="form-control" required
                                    autocomplete="off" value="{{ $user->email }}" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Masukkan Password</label>
                                <input type="password" name="password" id="password" class="form-control" required
                                    autocomplete="off" value="{{ $user->password }}" />
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Pilih Avatar</label>
                                <input type="hidden" name="oldImage" value="{{ $user->avatar }}">
                                @if ($user->avatar)
                                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                                        src="{{ asset('img/avatar/' . basename($user->avatar)) }}" alt="Preview Image">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-md-6 d-block">
                                @endif
                                <input type="file" onchange="previewImage()" name="avatar" id="avatar"
                                    class="form-control" autocomplete="off" />
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


        <div class="modal fade zoomIn" id="deleteModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
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
                            <form action="{{ route('Admin.user.destroy', $user->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn w-sm btn-danger "
                                    id="delete-record{{ $user->id }}">Ya, Hapus!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <script>
        function previewImage() {
            const foto = document.querySelector('#avatar')
            const preview = document.querySelector('.img-preview')

            preview.style.display = 'block'

            const ofReader = new FileReader()
            ofReader.readAsDataURL(foto.files[0])

            ofReader.onload = function(oFREvent) {
                preview.src = oFREvent.target.result
            }

        }
    </script> --}}
    <script>
        function previewImage() {
            const foto = document.querySelector('#avatar');
            const preview = document.querySelector('.img-preview');

            if (foto.files.length > 0 && foto.files[0]) {
                const fileReader = new FileReader();

                fileReader.onload = function(e) {
                    preview.src = e.target.result;
                };

                fileReader.readAsDataURL(foto.files[0]);
            } else {
                preview.src = '';
            }
        }
    </script>
@endsection
