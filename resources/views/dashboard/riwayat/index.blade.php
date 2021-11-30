@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto">
                <h3><strong>Riwayat</strong> Login</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="#" class="btn btn-success">Export</a>
            </div>
        </div>

        <div class="card">
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama User</th>
                            <th>Aktivitas</th>
                            <th>Waktu</th>
                            <th>Alamat IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- riwayats as riwayat --}}
                        @foreach ($riwayats as $riwayat)
                            <tr>
                                <td>{{ $riwayat->user_id }}</td>
                                <td>{{ $riwayat->user->nama_depan }} {{ $riwayat->user->nama_belakang }}</td>
                                <td>{{ $riwayat->aktivitas }}</td>
                                <td>{{ $riwayat->waktu }}</td>
                                <td>{{ $riwayat->alamat_ip }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                {{-- paginate --}}
                {{ $riwayats->links() }}
            </div>
            <div class="col-12 col-md-6 d-none d-md-inline-block">
                <div class="float-none float-md-end me-2">
                    {{ $riwayats->firstItem() ?? '0' }} to
                    {{ $riwayats->lastItem() ?? '0' }} of
                    {{ $riwayats->total() ?? '0' }} data
                </div>
            </div>
        </div>
    </div>
@endsection
