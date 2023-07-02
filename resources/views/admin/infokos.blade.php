@extends('layout.app')

@section('title', 'Info Kos')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Info Kos</h4>

                            <div class="align-right text-right">
                                @if ($infokos->isEmpty())
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#createInfoKosModal">
                                        Tambah Info Kos
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
                                            <th class="text-center">Link Kos JBR</th>
                                            <th class="text-center">Link Kos BWS</th>
                                            <th class="text-center">Link Tanggapan</th>
                                            <th class="text-center">Nama CP</th>
                                            <th class="text-center">Link Contact</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($infokos as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $item->link_kos_jbr }}</td>
                                                <td class="text-center">{{ $item->link_kos_bws }}</td>
                                                <td class="text-center">{{ $item->link_tanggapan }}</td>
                                                <td class="text-center">{{ $item->nama_cp }}</td>
                                                <td class="text-center">{{ $item->link_contact }}</td>
                                                <td class="align-middle text-center">
                                                    <span class="d-flex justify-content-center">
                                                        <button data-toggle="modal"
                                                            data-target="#editInfoKosModal{{ $item->id }}"
                                                            type="button" class="btn btn-info mx-2">Edit</button>
                                                        <form id="deleteInfoKosForm-{{ $item->id }}" method="post"
                                                            action="{{ route('infokos.destroy', $item->id) }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger mx-2"
                                                                onclick="confirmDelete('{{ $item->id }}')">Delete</button>
                                                        </form>
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
    </div>

    <!-- Add Info Kos Modal -->
    <div class="modal fade" id="createInfoKosModal" tabindex="-1" role="dialog" aria-labelledby="createInfoKosModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createInfoKosModalLabel">Tambah Info Kos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add Info Kos Form -->
                    <form action="{{ route('infokos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="link_kos_jbr">Link Kos JBR</label>
                            <input type="text" class="form-control" id="link_kos_jbr" name="link_kos_jbr"
                                placeholder="Link Kos JBR" required>
                        </div>
                        <div class="form-group">
                            <label for="link_kos_bws">Link Kos BWS</label>
                            <input type="text" class="form-control" id="link_kos_bws" name="link_kos_bws"
                                placeholder="Link Kos BWS" required>
                        </div>
                        <div class="form-group">
                            <label for="link_tanggapan">Link Tanggapan</label>
                            <input type="text" class="form-control" id="link_tanggapan" name="link_tanggapan"
                                placeholder="Link Tanggapan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_cp">Nama CP</label>
                            <input type="text" class="form-control" id="nama_cp" name="nama_cp" placeholder="Nama CP"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="link_contact">Link Contact</label>
                            <input type="text" class="form-control" id="link_contact" name="link_contact"
                                placeholder="Link Contact" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Info Kos Modals -->
    @foreach ($infokos as $index => $item)
        <div class="modal fade" id="editInfoKosModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editInfoKosModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editInfoKosModalLabel{{ $item->id }}">Edit Info Kos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit Info Kos Form -->
                        <form action="{{ route('infokos.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="link_kos_jbr{{ $item->id }}">Link Kos JBR</label>
                                <input type="text" class="form-control" id="link_kos_jbr{{ $item->id }}"
                                    name="link_kos_jbr" placeholder="Link Kos JBR" value="{{ $item->link_kos_jbr }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="link_kos_bws{{ $item->id }}">Link Kos BWS</label>
                                <input type="text" class="form-control" id="link_kos_bws{{ $item->id }}"
                                    name="link_kos_bws" placeholder="Link Kos BWS" value="{{ $item->link_kos_bws }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="link_tanggapan{{ $item->id }}">Link Tanggapan</label>
                                <input type="text" class="form-control" id="link_tanggapan{{ $item->id }}"
                                    name="link_tanggapan" placeholder="Link Tanggapan"
                                    value="{{ $item->link_tanggapan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_nama_cp{{ $item->id }}">Nama CP</label>
                                <input type="text" class="form-control" id="edit_nama_cp{{ $item->id }}"
                                    name="nama_cp" placeholder="Nama CP" value="{{ $item->nama_cp }}" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_link_contact{{ $item->id }}">Link Contact</label>
                                <input type="text" class="form-control" id="edit_link_contact{{ $item->id }}"
                                    name="link_contact" placeholder="Link Contact" value="{{ $item->link_contact }}"
                                    required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function confirmDelete(infoKosId) {
            Swal.fire({
                title: 'Yakin Mo Ngapus Bro?',
                text: "Nggak bakal bisa balik lo",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, saya yakin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form untuk menghapus data
                    document.getElementById('deleteInfoKosForm-' + infoKosId).submit();
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
