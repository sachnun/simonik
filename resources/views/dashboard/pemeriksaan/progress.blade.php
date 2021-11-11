@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-auto">
                <h3><strong>Pemeriksaan</strong> Progress</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('pemeriksaan.show', $pemeriksaan->id) }}" class="btn btn-secondary me-2">Batal</a>
                <input form="form" type="submit" class="btn btn-primary" value="Update">
            </div>
        </div>

        @include('dashboard.partials.alert')

        <form id="form" action="{{ route('progress.update', $pemeriksaan->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-4">NPWP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $pemeriksaan->npwp }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-4">Nama WP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $pemeriksaan->nama_wp }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-4">Nomor SP2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('nomor_sp2') is-invalid @enderror"
                                        value="{{ old('nomor_sp2', $pemeriksaan->nomor_sp2) }}" name="nomor_sp2">
                                    @error('nomor_sp2')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-form-label col-sm-4">Tanggal Jatuh Tempo</label>
                                <div class="col-sm-8">
                                    <input type="date"
                                        class="form-control @error('tanggal_jatuh_tempo_sp2') is-invalid @enderror"
                                        value="{{ old('tanggal_jatuh_tempo_sp2', $pemeriksaan->tanggal_jatuh_tempo_sp2) }}"
                                        name="tanggal_jatuh_tempo_sp2">
                                    @error('tanggal_jatuh_tempo_sp2')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    @php
                                        $percent = $pemeriksaan->percent();
                                    @endphp
                                    <p class="mb-2 font-weight-bold">Progress <span
                                            class="float-end">{{ $percent }}%</span></p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%;">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 40%">Prosedur Pengujian</th>
                                <th>Progres</th>
                                <th>Nilai</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- progress as progres --}}
                            @foreach ($progress as $progres)
                                <tr>
                                    <td>{{ $progres->prosedur_pengujian }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="form-check-input"
                                            name="check[{{ $progres->progress_pemeriksaan_id }}]"
                                            @if ($progres->check) checked @endif>
                                    </td>
                                    <td class="text-center">
                                        {{ $progres->nilai_bobot }}
                                    </td>
                                    <td>
                                        <input type="date" class="form-control"
                                            name="tanggal_pelaksanaan[{{ $progres->progress_pemeriksaan_id }}]"
                                            value="{{ $progres->tanggal_pelaksanaan }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            name="keterangan[{{ $progres->progress_pemeriksaan_id }}]"
                                            value="{{ $progres->keterangan }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25%">Prosedur Pengujian</th>
                                <th>Progres</th>
                                <th>Nilai</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- progress_files as progres_file --}}
                            @foreach ($progress_files as $progres_file)
                                <tr>
                                    <td>{{ $progres_file->prosedur_pengujian }}</td>
                                    <td>
                                        <input type="file" class="form-control"
                                            name="file[{{ $progres_file->progress_pemeriksaan_id }}]">
                                        @if ($progres_file->file and $progres_file->check)
                                            <small>*sudah terdapat file</small>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $progres_file->nilai_bobot }}
                                    </td>
                                    <td>
                                        <input type="date" class="form-control"
                                            name="tanggal_pelaksanaan[{{ $progres_file->progress_pemeriksaan_id }}]"
                                            value="{{ $progres->tanggal_pelaksanaan }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            name="keterangan[{{ $progres_file->progress_pemeriksaan_id }}]"
                                            value="{{ $progres->keterangan }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </form>

    </div>
@endsection
