@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 mb-lg-4">
            <div class="col-auto">
                <h3><strong>User</strong> Ubah</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('daftar-user.show', $user->id) }}" class="btn btn-secondary me-2">Kembali</a>
                <input type="submit" form="form" class="btn btn-primary" value="Simpan">
            </div>
        </div>

        <form id="form" action="{{ route('daftar-user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama Depan</label>
                            <input type="text" class="form-control @error('nama_depan') is-invalid @enderror"
                                name="nama_depan" value="{{ old('nama_depan', $user->nama_depan) }}">
                            @error('nama_depan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror"
                                name="nama_belakang" value="{{ old('nama_belakang', $user->nama_belakang) }}">
                            @error('nama_belakang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">NIP Sikka</label>
                            <input type="text" class="form-control @error('nip_sikka') is-invalid @enderror"
                                name="nip_sikka" value="{{ old('nip_sikka', $user->nip_sikka) }}">
                            @error('nip_sikka')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">User Role</label>
                            {{-- select with old value --}}
                            <select class="form-control mb-3 @error('role') is-invalid @enderror" name="role">
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                    User
                                </option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" value="{{ old('password') }}">
                            <small>*hanya di isi jika ingin merubahnya</small>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
