@extends('layout.app')

@section('title', 'Mitra')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Mitra</h4>

                            <div class="align-right text-right">
                                @if ($mitra->isEmpty())
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#createMitraModal">
                                        Tambah Mitra
                                    </button>
                                @endif
                            </div>
                            <br>

                            <div class="search-element">
                                <input id="searchInput" class="form-control" type="search" placeholder="Search"
                                    aria-label="Search">
                            </div>

                            <br>

                            <div class="table-responsive">
                                <table id="example" class="table table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Link Mitra</th>
                                            <th class="text-center">Nama CP</th>
                                            <th class="text-center">Link CP</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mitra as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $item->link_mitra }}</td>
                                                <td class="text-center">{{ $item->nama_cp }}</td>
                                                <td class="text-center">{{ $item->link_cp }}</td>
                                                <td class="align-middle text-center">
                                                    <span class="d-flex justify-content-center">
                                                        <button data-toggle="modal"
                                                            data-target="#editMitraModal{{ $item->id }}" type="button"
                                                            class="btn btn-info mx-2">Edit</button>
                                                        <form id="deleteMitraForm-{{ $item->id }}" method="post"
                                                            action="{{ route('mitra.destroy', $item->id) }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger mx-2"
                                                                onclick="confirmDelete('{{ $item->id }}')">Delete</button>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>

                                            <!-- Edit Mitra Modal -->
                                            <div class="modal fade" id="editMitraModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="editMitraModalLabel{{ $item->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editMitraModalLabel{{ $item->id }}">Edit Mitra</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="{{ route('mitra.update', $item->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="editLinkMitra">Link Mitra</label>
                                                                    <input type="text" class="form-control"
                                                                        id="editLinkMitra" name="link_mitra"
                                                                        value="{{ $item->link_mitra }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editNamaCP">Nama CP</label>
                                                                    <input type="text" class="form-control"
                                                                        id="editNamaCP" name="nama_cp"
                                                                        value="{{ $item->nama_cp }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editLinkCP">Link CP</label>
                                                                    <input type="text" class="form-control"
                                                                        id="editLinkCP" name="link_cp"
                                                                        value="{{ $item->link_cp }}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan
                                                                        Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>
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

    <!-- Add Mitra Modal -->
    <div class="modal fade" id="createMitraModal" tabindex="-1" role="dialog" aria-labelledby="createMitraModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createMitraModalLabel">Tambah Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('mitra.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="linkMitra">Link Mitra</label>
                            <input type="text" class="form-control" id="linkMitra" name="link_mitra">
                        </div>
                        <div class="form-group">
                            <label for="namaCP">Nama CP</label>
                            <input type="text" class="form-control" id="namaCP" name="nama_cp">
                        </div>
                        <div class="form-group">
                            <label for="linkCP">Link CP</label>
                            <input type="text" class="form-control" id="linkCP" name="link_cp">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus mitra ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("deleteMitraForm-" + id).submit();
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
