<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/light.css') }}">
</head>

<body>

    <main class="d-flex w-100 h-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-7 col-lg-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center my-4">
                            <h1 class="h2">Simonik</h1>
                            <p class="lead">
                                Sistem Monitoring dan evaluasi Pelayanan Publik
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="{{ route('authenticate') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">NIP Sikka</label>
                                            <input
                                                class="form-control form-control-lg @error('nip_sikka') is-invalid @enderror"
                                                type="text" name="nip_sikka" value="{{ old('nip_sikka') }}">
                                            @error('nip_sikka')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                type="password" name="password" value="">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
