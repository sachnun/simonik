@extends('dashboard.template')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-auto">
                <h3><strong>User</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('daftar-user.create') }}" class="btn btn-primary">User Baru</a>
            </div>
        </div>

        @include('dashboard.partials.alert')

        <div class="card">
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama User</th>
                            <th>NIP Sikka</th>
                            <th>Role</th>
                            <th style="width: 8%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nama_depan }} {{ $user->nama_belakang }}</td>
                                <td>{{ $user->nip_sikka }}</td>
                                <td class="text-capitalize">{{ $user->role }}</td>
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
                                                href="{{ route('daftar-user.show', $user->id) }}">Lihat</a>
                                            <a class="dropdown-item"
                                                href="{{ route('daftar-user.edit', $user->id) }}">Edit</a>
                                            <form action="{{ route('daftar-user.destroy', $user->id) }}" method="POST"
                                                class="d-inline">
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
                {{ $users->links() }}
            </div>
            <div class="col-12 col-md-6 d-none d-md-inline-block">
                <div class="float-none float-md-end me-2">
                    {{ $users->firstItem() ?? '0' }} to
                    {{ $users->lastItem() ?? '0' }} of
                    {{ $users->total() ?? '0' }} data
                </div>
            </div>
        </div>
    </div>
@endsection
