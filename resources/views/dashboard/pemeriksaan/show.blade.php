@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 mb-lg-4">
            <div class="col-auto">
                <h3><strong>Pemeriksaan</strong> Detail</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ $kembali }}" class="btn btn-secondary me-2 d-none d-md-inline-block">Kembali</a>
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Aksi
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('pemeriksaan.edit', $pemeriksaan->id) }}">Edit</a>
                        <form action="{{ route('pemeriksaan.destroy', $pemeriksaan->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item text-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                <a href="{{ route('progress.edit', $pemeriksaan->id) }}" class="btn btn-primary">Perbarui</a>
            </div>
        </div>

        @include('dashboard.partials.alert')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">NPWP</label>
                        <input type="text" class="form-control" value="{{ $pemeriksaan->npwp }}" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama WP</label>
                        <input type="text" class="form-control" value="{{ $pemeriksaan->nama_wp }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nomor SP2</label>
                        <input type="text" class="form-control" value="{{ $pemeriksaan->nomor_sp2 }}" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tanggal SP2</label>
                        <input type="date" class="form-control" value="{{ $pemeriksaan->tanggal_sp2 }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nomor SP2 Perubahan</label>
                        <input type="text" class="form-control" value="{{ $pemeriksaan->nomor_sp2_perubahan }}"
                            readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tanggal SP2 Perubahan</label>
                        <input type="date" class="form-control" value="{{ $pemeriksaan->tanggal_sp2_perubahan }}"
                            readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nomor ND Perpanjangan SP2</label>
                        <input type="text" class="form-control" value="{{ $pemeriksaan->nomor_nd_perpanjangan }}"
                            readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tanggal Penyampaian SP2</label>
                        <input type="date" class="form-control" value="{{ $pemeriksaan->tanggal_penyampaian_sp2 }}"
                            readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Kode Pemeriksaan</label>
                        <input type="text" class="form-control" value="{{ $pemeriksaan->kode_pemeriksaan }}" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tanggal Jatuh Tempo SP2</label>
                        <input type="date" class="form-control" value="{{ $pemeriksaan->tanggal_jatuh_tempo_sp2 }}"
                            readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Kriteria Pemeriksaan</label>
                        <select class="form-control mb-3" disabled>
                            <option selected>Rutin</option>
                            <option>Khusus</option>
                            <option>Tujuan Lain</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nilai Potensi</label>
                        <input type="text" class="form-control" value="{{ $pemeriksaan->nilai_potensi }}" readonly>
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
                                    <input type="date" class="form-control"
                                        value="{{ $pemeriksaan->masa_pajak_start }}" readonly>
                                </div>
                                <div class="col-1">
                                    <span>-</span>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" value="{{ $pemeriksaan->masa_pajak_end }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Dokumen</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($documents as $document)
                            <li class="list-group-item">
                                @if ($document->file)
                                    <a href="{{ asset('storage/' . $document->file) }}" target="_blank">
                                        {{ $document->prosedur_pengujian }}
                                    </a>
                                @else
                                    {{ $document->prosedur_pengujian }}
                                @endif
                            </li>
                        @endforeach
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
                            <input type="text" class="form-control" value="{{ $pemeriksaan->ketua_tim }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Anggota 1</label>
                            <input type="text" class="form-control" value="{{ $pemeriksaan->anggota_1 }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Anggota 2</label>
                            <input type="text" class="form-control" value="{{ $pemeriksaan->anggota_2 }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Anggota 3</label>
                            <input type="text" class="form-control" value="{{ $pemeriksaan->anggota_3 }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
