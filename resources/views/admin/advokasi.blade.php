@extends('layout.app')

@section('title', 'Layanan Advokasi')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Layanan Advokasi</h4>

                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input id="start_date" class="form-control" type="datetime-local"
                                                placeholder="Select Start Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input id="end_date" class="form-control" type="datetime-local"
                                                placeholder="Select End Date">
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Kritik/Saran</th>
                                            <th>Angkatan</th>
                                            <th>Jurusan</th>
                                            <th>Program Studi</th>
                                            <th>Layanan</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($layananAdvokasi as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->kritik_saran }}</td>
                                                <td>{{ $item->angkatan->tahun_angkatan }}</td>
                                                <td>{{ $item->jurusan->nama_jurusan }}</td>
                                                <td>{{ $item->prodi->nama_prodi }}</td>
                                                <td>{{ $item->layanan->nama_layanan }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
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

    <script>
        $(document).ready(function() {
            $('#start_date').on('change', function() {
                filterTable();
            });

            $('#end_date').on('change', function() {
                filterTable();
            });

            function filterTable() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                $('table tbody tr').each(function() {
                    var rowDate = $(this).find('td:nth-child(9)').text().trim();

                    if (startDate && endDate) {
                        if (rowDate >= startDate && rowDate <= endDate) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    } else {
                        $(this).show();
                    }
                });
            }
        });
    </script>
@endsection
