@extends('layout.app')

@section('title', 'Struktur Pengurus')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Struktur Pengurus</h4>

                            <div class="align-right text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                    Tambah Data Pengurus
                                </button>
                            </div>
                            <br>
                            <div class="search-element">
                                <input id="searchInput" class="form-control" type="search" placeholder="Search"
                                    aria-label="Search">
                            </div>

                            <br>
                            @if ($errors->has('foto'))
                                <div class="text-danger">{{ $errors->first('foto') }}</div>
                            @endif
                            <br>
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Asal</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengurus as $no => $p)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td class="text-center">{{ $p->nama }}</td>
                                                <td class="text-center">{{ $p->jabatan }}</td>
                                                <td class="text-center">{{ $p->asal }}</td>
                                                <td class="text-center">
                                                    @if ($p->foto)
                                                        <img src="{{ asset('uploads/' . $p->foto) }}"
                                                            alt="{{ $p->nama }}" class="img-fluid"
                                                            style="max-height: 100px;">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button data-toggle="modal" data-target="#editModal{{ $p->id }}"
                                                        type="button" class="btn btn-info">Edit</button>
                                                    <button data-toggle="modal"
                                                        data-target="#deleteModal{{ $p->id }}" type="button"
                                                        class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1"
                                                aria-labelledby="editModalLabel{{ $p->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $p->id }}">
                                                                Edit Data Pengurus</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('pengurus.update', $p->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="nama" class="form-label">Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama" name="nama"
                                                                        value="{{ $p->nama }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jabatan" class="form-label">Jabatan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="jabatan" name="jabatan"
                                                                        value="{{ $p->jabatan }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="asal" class="form-label">Asal</label>
                                                                    <input type="text" class="form-control"
                                                                        id="asal" name="asal"
                                                                        value="{{ $p->asal }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="foto" class="form-label">Foto</label>
                                                                    <input type="file" class="form-control"
                                                                        id="foto" name="foto" accept="image/*">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $p->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $p->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $p->id }}">Delete Data
                                                                Pengurus</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('pengurus.destroy', $p->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this data?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Pengurus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="asal" class="form-label">Asal</label>
                            <input type="text" class="form-control" id="asal" name="asal" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @if ($errors->has('foto'))
                                <span class="text-danger">{{ $errors->first('foto') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
