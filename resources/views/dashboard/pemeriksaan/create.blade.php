@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 mb-lg-4">
            <div class="col-auto">
                <h3><strong>Pemeriksaan</strong> Baru</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Batal</a>
                <input type="submit" form="form" class="btn btn-primary" value="Simpan">
            </div>
        </div>

        <form id="form" action="{{ route('pemeriksaan.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">NPWP</label>
                            <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp"
                                value="{{ old('npwp') }}">
                            @error('npwp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama WP</label>
                            <input type="text" class="form-control @error('nama_wp') is-invalid @enderror" name="nama_wp"
                                value="{{ old('nama_wp') }}">
                            @error('nama_wp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nomor SP2</label>
                            <input type="text" class="form-control @error('nomor_sp2') is-invalid @enderror"
                                name="nomor_sp2" value="{{ old('nomor_sp2') }}">
                            @error('nomor_sp2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tanggal SP2</label>
                            <input type="date" class="form-control @error('tanggal_sp2') is-invalid @enderror"
                                name="tanggal_sp2" value="{{ old('tanggal_sp2') }}">
                            @error('tanggal_sp2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nomor SP2 Perubahan</label>
                            <input type="text" class="form-control @error('nomor_sp2_perubahan') is-invalid @enderror"
                                name="nomor_sp2_perubahan" value="{{ old('nomor_sp2_perubahan') }}">
                            @error('nomor_sp2_perubahan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tanggal SP2 Perubahan</label>
                            <input type="date" class="form-control @error('tanggal_sp2_perubahan') is-invalid @enderror"
                                name="tanggal_sp2_perubahan" value="{{ old('tanggal_sp2_perubahan') }}">
                            @error('tanggal_sp2_perubahan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nomor ND Perpanjangan SP2</label>
                            <input type="text" class="form-control @error('nomor_nd_perpanjangan') is-invalid @enderror"
                                name="nomor_nd_perpanjangan" value="{{ old('nomor_nd_perpanjangan') }}">
                            @error('nomor_nd_perpanjangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tanggal Penyampaian SP2</label>
                            <input type="date" class="form-control @error('tanggal_penyampaian_sp2') is-invalid @enderror"
                                name="tanggal_penyampaian_sp2" value="{{ old('tanggal_penyampaian_sp2') }}">
                            @error('tanggal_penyampaian_sp2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kode Pemeriksaan</label>
                            <input type="text" class="form-control @error('kode_pemeriksaan') is-invalid @enderror"
                                name="kode_pemeriksaan" value="{{ old('kode_pemeriksaan') }}">
                            @error('kode_pemeriksaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tanggal Jatuh Tempo SP2</label>
                            <input type="date" class="form-control @error('tanggal_jatuh_tempo_sp2') is-invalid @enderror"
                                name="tanggal_jatuh_tempo_sp2" value="{{ old('tanggal_jatuh_tempo_sp2') }}">
                            @error('tanggal_jatuh_tempo_sp2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kriteria Pemeriksaan</label>
                            {{-- select with old value --}}
                            <select class="form-control mb-3 @error('kriteria_pemeriksaan') is-invalid @enderror"
                                name="kriteria_pemeriksaan">
                                <option value="rutin" {{ old('kriteria_pemeriksaan') == 'rutin' ? 'selected' : '' }}>
                                    Rutin
                                </option>
                                <option value="khusus" {{ old('kriteria_pemeriksaan') == 'khusus' ? 'selected' : '' }}>
                                    Khusus
                                </option>
                                <option value="tujuan_lain"
                                    {{ old('kriteria_pemeriksaan') == 'tujuan_lain' ? 'selected' : '' }}>
                                    Tujuan Lain
                                </option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nilai Potensi</label>
                            <input type="number" class="form-control @error('nilai_potensi') is-invalid @enderror"
                                name="nilai_potensi" value="{{ old('nilai_potensi') }}">
                            @error('nilai_potensi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Masa dan Tahun Pajak</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="date"
                                            class="form-control @error('masa_pajak_start') is-invalid @enderror"
                                            name="masa_pajak_start" value="{{ old('masa_pajak_start') }}">
                                        @error('masa_pajak_start')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1">
                                        <span>-</span>
                                    </div>
                                    <div class="col">
                                        <input type="date"
                                            class="form-control @error('masa_pajak_end') is-invalid @enderror"
                                            name="masa_pajak_end" value="{{ old('masa_pajak_end') }}">
                                        @error('masa_pajak_end')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Tim Pelaksana</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Ketua Tim</label>
                                <input type="text" class="form-control @error('ketua_tim') is-invalid @enderror"
                                    name="ketua_tim" value="{{ old('ketua_tim') }}">
                                @error('ketua_tim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Anggota 1</label>
                                <input type="text" class="form-control @error('anggota_1') is-invalid @enderror"
                                    name="anggota_1" value="{{ old('anggota_1') }}">
                                @error('anggota_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Anggota 2</label>
                                <input type="text" class="form-control @error('anggota_2') is-invalid @enderror"
                                    name="anggota_2" value="{{ old('anggota_2') }}">
                                @error('anggota_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Anggota 3</label>
                                <input type="text" class="form-control @error('anggota_3') is-invalid @enderror"
                                    name="anggota_3" value="{{ old('anggota_3') }}">
                                @error('anggota_3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
