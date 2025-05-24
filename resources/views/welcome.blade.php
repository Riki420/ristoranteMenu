<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Benvenuto</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font antico da Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url('/images/background.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            font-family: 'IM Fell English', serif;
            color: #3c2e1d;
        }

        .btn-vintage {
            background-color: #7e2d19;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 0.75rem 2rem;
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }

        .btn-vintage:hover {
            background-color: #5c1f11;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center text-center">
        <h1 class="mb-4 display-4">Benvenuti alla Locanda del Pellegrino</h1>

        <a href="{{ route('menu.index') }}" class="btn btn-vintage mb-3">
            Apri il Menù
        </a>

        @auth
            <a href="{{ route('dashboard') }}" class="text-dark text-decoration-none mt-3 fw-bold">
                Vai alla Dashboard
            </a>
        @endauth
    </div>

    {{-- Bootstrap JS (opzionale) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
