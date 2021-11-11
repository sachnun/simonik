@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <div class="row mb-3">
                <div class="col-auto">
                    <h3><strong>Kegiatan Pemeriksaan</strong> Tahun Berjalan</h3>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Semua</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-bar-chart-2 align-middle">
                                            <line x1="18" y1="20" x2="18" y2="10"></line>
                                            <line x1="12" y1="20" x2="12" y2="4"></line>
                                            <line x1="6" y1="20" x2="6" y2="14"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">{{ $pemeriksaans->count() }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Rutin</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-bar-chart-2 align-middle">
                                            <line x1="18" y1="20" x2="18" y2="10"></line>
                                            <line x1="12" y1="20" x2="12" y2="4"></line>
                                            <line x1="6" y1="20" x2="6" y2="14"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">
                                {{ $pemeriksaans->where('kriteria_pemeriksaan', 'rutin')->count() }}
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Khusus</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-bar-chart-2 align-middle">
                                            <line x1="18" y1="20" x2="18" y2="10"></line>
                                            <line x1="12" y1="20" x2="12" y2="4"></line>
                                            <line x1="6" y1="20" x2="6" y2="14"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">
                                {{ $pemeriksaans->where('kriteria_pemeriksaan', 'khusus')->count() }}
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Tujuan Lain</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-bar-chart-2 align-middle">
                                            <line x1="18" y1="20" x2="18" y2="10"></line>
                                            <line x1="12" y1="20" x2="12" y2="4"></line>
                                            <line x1="6" y1="20" x2="6" y2="14"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">
                                {{ $pemeriksaans->where('kriteria_pemeriksaan', 'tujuan_lain')->count() }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="row mb-3">
                <div class="col-auto">
                    <h3><strong>Status Pemeriksaan</strong> Tahun Berjalan</h3>
                </div>
            </div>

            <div class="mb-3">
                <h1 class="h4 mb-3">Rutin dan Khusus</h1>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Dalam
                                            proses</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bar-chart-2 align-middle">
                                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1">0</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title text-reset">
                                            Akan Jatuh Tempo
                                        </h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat bg-white text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bar-chart-2 align-middle">
                                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 text-reset">0</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title text-reset">
                                            Sudah Jatuh Tempo
                                        </h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat bg-white text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bar-chart-2 align-middle">
                                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 text-reset">0</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title text-reset">
                                            Diperpanjang
                                        </h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat bg-white text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bar-chart-2 align-middle">
                                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 text-reset">0</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title text-reset">
                                            Selesai
                                        </h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat bg-white text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-check-circle align-middle">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 text-reset">0</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h1 class="h4 mb-3">Tujuan Lain</h1>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Dalam
                                            proses</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bar-chart-2 align-middle">
                                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1">0</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title text-reset">
                                            Akan Jatuh Tempo
                                        </h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat bg-white text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bar-chart-2 align-middle">
                                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 text-reset">0</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title text-reset">
                                            Sudah Jatuh Tempo
                                        </h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat bg-white text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bar-chart-2 align-middle">
                                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 text-reset">0</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title text-reset">
                                            Selesai
                                        </h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat bg-white text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bar-chart-2 align-middle">
                                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 text-reset">0</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="row mb-3">
                <div class="col-auto">
                    <h3><strong>Surat Ketetapan Pajak</strong> Tahun Berjalan</h3>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Diterbitkan</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-bar-chart-2 align-middle">
                                            <line x1="18" y1="20" x2="18" y2="10"></line>
                                            <line x1="12" y1="20" x2="12" y2="4"></line>
                                            <line x1="6" y1="20" x2="6" y2="14"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">Rp. 0</h1>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Disetujui</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-bar-chart-2 align-middle">
                                            <line x1="18" y1="20" x2="18" y2="10"></line>
                                            <line x1="12" y1="20" x2="12" y2="4"></line>
                                            <line x1="6" y1="20" x2="6" y2="14"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1">Rp. 0</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#centeredModalWarning">
        Warning
    </button>

    <div class="modal fade" id="centeredModalWarning" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <p class="mb-0">Terdapat pemeriksaan yang akan jatuh tempo</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning">Lihat</button>
                </div>
            </div>
        </div>
    </div>
@endsection
