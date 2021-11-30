@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 mb-lg-4">
            <div class="col-auto">
                <h3>
                    <strong class="d-none d-md-inline-block">Surat Ketetapan Pajak</strong>
                    <strong class="d-inline-block d-md-none">SKP</strong>
                    <span>Detail</span>
                </h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('surat-ketetapan-pajak.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Aksi
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item"
                            href="{{ route('surat-ketetapan-pajak.edit', $surat_ketetapan_pajak->id) }}">Edit</a>
                        <form action="{{ route('surat-ketetapan-pajak.destroy', $surat_ketetapan_pajak->id) }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item text-danger"
                                onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials.alert')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">NPWP</label>
                        <input type="text" class="form-control" value="{{ $surat_ketetapan_pajak->npwp }}" readonly />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama WP</label>
                        <input type="text" class="form-control" value="{{ $surat_ketetapan_pajak->nama_wp }}"
                            readonly />
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nomor SKP</label>
                        <input type="text" class="form-control" value="{{ $surat_ketetapan_pajak->nomor_skp }}"
                            readonly />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tanggal SKP</label>
                        <input type="date" class="form-control" value="{{ $surat_ketetapan_pajak->tanggal_skp }}"
                            readonly />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nomor LHP</label>
                        <input type="text" class="form-control" value="{{ $surat_ketetapan_pajak->nomor_lhp }}"
                            readonly />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tanggal LHP</label>
                        <input type="date" class="form-control" value="{{ $surat_ketetapan_pajak->tanggal_lhp }}"
                            readonly />
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nominal Terbit</label>
                        <input type="text" class="form-control"
                            value="{{ 'Rp ' . number_format($surat_ketetapan_pajak->nominal_terbit, 0, ',', '.') }}"
                            readonly />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nominal Disetujui</label>
                        <input type="text" class="form-control"
                            value="{{ 'Rp ' . number_format($surat_ketetapan_pajak->nominal_disetujui, 0, ',', '.') }}"
                            readonly />
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
