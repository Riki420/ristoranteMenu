<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Font Antico -->
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- App CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

        footer {
            background-color: rgba(255, 255, 255, 0.8);
            border-top: 2px solid #a58c6f;
            padding: 2rem 0;
            margin-top: 2rem;
        }

        h5 {
            font-weight: bold;
            font-size: 1.3rem;
        }

        .list-unstyled li {
            font-size: 0.95rem;
        }

        .logo-link svg {
            fill: #3c2e1d;
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

    <div class="min-vh-100 d-flex flex-column">
        <div class="text-center my-4">
            <a href="/menu" class="logo-link">
                <x-application-logo class="w-20 h-20 fill-current" />
            </a>
        </div>

        <section class="flex-grow-1">
            <div class="container py-4">
                {{ $slot }}
            </div>
        </section>

        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
