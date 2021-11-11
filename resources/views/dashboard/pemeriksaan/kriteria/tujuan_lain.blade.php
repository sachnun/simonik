@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-auto">
                <h3><strong>Pemeriksaan</strong> Tujuan Lain</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="#" class="btn btn-success me-2">Export</a>
                <a href="{{ route('pemeriksaan.create') }}" class="btn btn-primary">Data Baru</a>
            </div>
        </div>

        @include('dashboard.partials.alert')

        <div class="card">
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NPWP</th>
                            <th>Nama WP</th>
                            <th>Nomor SP2</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th class="text-center">Progres</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- pemeriksaans as pemeriksaan --}}
                        @foreach ($pemeriksaans as $pemeriksaan)
                            <tr>
                                {{-- loop index with paginate --}}
                                <td>{{ $pemeriksaans->firstItem() + $loop->index }}</td>
                                <td>{{ $pemeriksaan->npwp }}</td>
                                <td>{{ $pemeriksaan->nama_wp }}</td>
                                <td>{{ $pemeriksaan->nomor_sp2 }}</td>
                                <td>{{ $pemeriksaan->tanggal_jatuh_tempo_sp2 }}</td>
                                <td class="text-center">{{ $pemeriksaan->percent() }}%</td>
                                <td>-</td>
                                <td class="table-action">
                                    <div class="dropdown position-relative">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"
                                            class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-vertical align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="12" cy="5" r="1"></circle>
                                                <circle cx="12" cy="19" r="1"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="{{ route('pemeriksaan.show', $pemeriksaan->id) }}">Lihat</a>
                                            <a class="dropdown-item"
                                                href="{{ route('progress.edit', $pemeriksaan->id) }}">Perbarui</a>
                                            <a class="dropdown-item"
                                                href="{{ route('pemeriksaan.edit', $pemeriksaan->id) }}">Edit</a>
                                            <form action="{{ route('pemeriksaan.destroy', $pemeriksaan->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item text-danger"
                                                    onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                {{-- paginate --}}
                {{ $pemeriksaans->links() }}
            </div>
            <div class="col-12 col-md-6 d-none d-md-inline-block">
                <div class="float-none float-md-end me-2">
                    {{ $pemeriksaans->firstItem() ?? '0' }} to
                    {{ $pemeriksaans->lastItem() ?? '0' }} of
                    {{ $pemeriksaans->total() ?? '0' }} data
                </div>
            </div>
        </div>
    </div>
@endsection
