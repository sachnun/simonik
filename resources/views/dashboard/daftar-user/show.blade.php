@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 mb-lg-4">
            <div class="col-auto">
                <h3><strong>User</strong> Detail</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('daftar-user.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Aksi
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('daftar-user.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('daftar-user.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item text-danger"
                                onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" value="{{ $user->nama_depan }}" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" value="{{ $user->nama_belakang }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">NIP Sikka</label>
                        <input type="text" class="form-control" value="{{ $user->nip_sikka }}" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">User Role</label>
                        <input type="text" class="form-control text-capitalize" value="{{ $user->role }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Riwayat Login</h5>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
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

    </div>
@endsection
