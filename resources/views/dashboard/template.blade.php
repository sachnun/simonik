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
    <div class="wrapper">
        @include('dashboard.sidebar')

        <div class="main">
            @include('dashboard.navbar')

            <main class="content">
                @yield('content')
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-start">
                            <p class="mb-0">
                                <strong>Create by Dakunesu - Just for sample.</strong>
                            </p>
                        </div>
                        <div class="col-0 text-end">

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
