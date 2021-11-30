@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 mb-lg-4">
            <div class="col-auto">
                <h3>
                    <strong class="d-none d-md-inline-block">Surat Ketetapan Pajak</strong>
                    <strong class="d-inline-block d-md-none">SKP</strong>
                    <span>Ubah</span>
                </h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Batal</a>
                <input type="submit" form="form" class="btn btn-primary" value="Update">
            </div>
        </div>

        <form id="form" action="{{ route('surat-ketetapan-pajak.update', $surat_ketetapan_pajak->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">NPWP</label>
                            <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp"
                                value="{{ old('npwp', $surat_ketetapan_pajak->npwp) }}">
                            @error('npwp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama WP</label>
                            <input type="text" class="form-control @error('nama_wp') is-invalid @enderror" name="nama_wp"
                                value="{{ old('nama_wp', $surat_ketetapan_pajak->nama_wp) }}">
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
                            <label class="form-label">Nomor SKP</label>
                            <input type="text" class="form-control @error('nomor_skp') is-invalid @enderror"
                                name="nomor_skp" value="{{ old('nomor_skp', $surat_ketetapan_pajak->nomor_skp) }}">
                            @error('nomor_skp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tanggal SKP</label>
                            <input type="date" class="form-control @error('tanggal_skp') is-invalid @enderror"
                                name="tanggal_skp" value="{{ old('tanggal_skp', $surat_ketetapan_pajak->tanggal_skp) }}">
                            @error('tanggal_skp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nomor LHP</label>
                            <input type="text" class="form-control @error('nomor_lhp') is-invalid @enderror"
                                name="nomor_lhp" value="{{ old('nomor_lhp', $surat_ketetapan_pajak->nomor_lhp) }}">
                            @error('nomor_lhp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tanggal LHP</label>
                            <input type="date" class="form-control @error('tanggal_lhp') is-invalid @enderror"
                                name="tanggal_lhp" value="{{ old('tanggal_lhp', $surat_ketetapan_pajak->tanggal_lhp) }}">
                            @error('tanggal_lhp')
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
                            <label class="form-label">Nominal Terbit</label>
                            <input type="number" class="form-control @error('nominal_terbit') is-invalid @enderror"
                                name="nominal_terbit"
                                value="{{ old('nominal_terbit', $surat_ketetapan_pajak->nominal_terbit) }}">
                            @error('nominal_terbit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nominal Disetujui</label>
                            <input type="number" class="form-control @error('nominal_disetujui') is-invalid @enderror"
                                name="nominal_disetujui"
                                value="{{ old('nominal_disetujui', $surat_ketetapan_pajak->nominal_disetujui) }}">
                            @error('nominal_disetujui')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
