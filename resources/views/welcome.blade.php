<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Benvenuto</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center text-center">
        <h1 class="mb-4 display-4">Benvenuti al Ristorante</h1>

        <a href="{{ route('menu.index') }}" class="btn btn-outline-light btn-lg rounded-pill px-5 py-2 mb-3">
            Apri il Menù
        </a>

        @auth
            <a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none mt-3">
                Vai alla Dashboard
            </a>
        @endauth
    </div>

    {{-- Bootstrap JS (opzionale) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
