@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-auto">
                <h3>
                    <strong class="d-none d-md-inline-block">Surat Ketetapan Pajak</strong>
                    <strong class="d-inline-block d-md-none">SKP</strong>
                </h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="#" class="btn btn-success me-2">Export</a>
                <a href="{{ route('surat-ketetapan-pajak.create') }}" class="btn btn-primary">Data Baru</a>
            </div>
        </div>

        @include('dashboard.partials.alert')

        <div class="card">
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. SKP</th>
                            <th>Tanggal SKP</th>
                            <th>Nominal Terbit</th>
                            <th>Nominal Disetujui</th>
                            {{-- <th>Nilai Potensi</th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- surat_ketetapan_pajaks as surat_ketetapan_pajak --}}
                        @foreach ($surat_ketetapan_pajaks as $surat_ketetapan_pajak)
                            <tr>
                                <td>{{ $surat_ketetapan_pajaks->firstItem() + $loop->index }}</td>
                                <td>{{ $surat_ketetapan_pajak->nomor_skp }}</td>
                                <td>{{ $surat_ketetapan_pajak->tanggal_skp }}</td>
                                <td>{{ 'Rp ' . number_format($surat_ketetapan_pajak->nominal_terbit, 0, ',', '.') }}</td>
                                <td>{{ 'Rp ' . number_format($surat_ketetapan_pajak->nominal_disetujui, 0, ',', '.') }}
                                </td>
                                {{-- <td>{{ $surat_ketetapan_pajak->nilai_potensi }}</td> --}}
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
                                                href="{{ route('surat-ketetapan-pajak.show', $surat_ketetapan_pajak->id) }}">Lihat</a>
                                            <a class="dropdown-item"
                                                href="{{ route('surat-ketetapan-pajak.edit', $surat_ketetapan_pajak->id) }}">Edit</a>
                                            <form
                                                action="{{ route('surat-ketetapan-pajak.destroy', $surat_ketetapan_pajak->id) }}"
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
                {{ $surat_ketetapan_pajaks->links() }}
            </div>
            <div class="col-12 col-md-6 d-none d-md-inline-block">
                <div class="float-none float-md-end me-2">
                    {{ $surat_ketetapan_pajaks->firstItem() ?? '0' }} to
                    {{ $surat_ketetapan_pajaks->lastItem() ?? '0' }} of
                    {{ $surat_ketetapan_pajaks->total() ?? '0' }} data
                </div>
            </div>
        </div>
    </div>
@endsection
