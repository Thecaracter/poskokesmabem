@extends('layout.app')

@section('title', 'FAQ')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data FAQ</h4>

                            <div class="align-right text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                    Tambah Data FAQ
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
                                            <th class="text-center">Pertanyaan</th>
                                            <th class="text-center">Jawaban</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $no => $faq)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td class="text-center">{{ $faq->pertanyaan }}</td>
                                                <td class="text-center">{{ $faq->jawaban }}</td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editUserModal{{ $faq->id }}" type="button"
                                                            class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $faq->id }}" method="post"
                                                            action="{{ route('faq.destroy', $faq->id) }}"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $faq->id }}')">Delete</button>
                                                        </form>
                                                        <script>
                                                            function confirmDelete(faqId) {
                                                                Swal.fire({
                                                                    title: 'Yakin Mo Ngapus Bro?',
                                                                    text: "Nggak bakal bisa balik lo",
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yes, delete it!'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        // Submit form untuk menghapus data
                                                                        document.getElementById('deleteForm-' + faqId).submit();
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    </span>
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
        <!-- Tambah FAQ Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Data FAQ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                            </div>
                            <div class="mb-3">
                                <label for="jawaban" class="form-label">Jawaban</label>
                                <textarea class="form-control" id="jawaban" name="jawaban" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit FAQ -->
        @foreach ($faqs as $faq)
            <div class="modal fade" id="editUserModal{{ $faq->id }}" tabindex="-1" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Edit FAQ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                                        value="{{ $faq->pertanyaan }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban" class="form-label">Jawaban</label>
                                    <textarea class="form-control" id="jawaban" name="jawaban" required>{{ $faq->jawaban }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

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
        @if (session('notification'))
            <script>
                $(document).ready(function() {
                    const {
                        title,
                        text,
                        type
                    } = @json(session('notification'));
                    Swal.fire(title, text, type);
                });
            </script>
        @endif
        <script>
            $(document).ready(function() {
                $('#createModal').on('hidden.bs.modal', function() {
                    $(this).find('form')[0].reset();
                });
            });
        </script>
    @endsection
