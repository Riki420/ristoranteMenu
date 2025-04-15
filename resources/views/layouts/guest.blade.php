<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased font-sans text-white bg-dark">
        <div class="min-h-screen">
            <div class="text-center">
                <a href="/menu">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <section>
                <div class="container py-5 text-white">
                    {{ $slot }}
                </div>
            </section>
            <main>
                @yield('content') <!-- Questa è la sezione dove viene renderizzato il contenuto, come il login o la registrazione -->
            </main>
            
        </div>


        <footer class="bg-dark text-white py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h5>Locanda Del Pellegrino</h5>
                  <p>4.4 ★★★★☆ (484 recensioni)</p>
                  <p>€€ Ristorante</p>
                  <p>Servizio: Ha tavoli all'aperto · Dispone di camino · Serve piatti vegetariani</p>
                </div>
                <div class="col-md-6">
                  <h5>Indirizzo</h5>
                  <p>Via Bocca di Rio, 20, 40035 Baragazza BO</p>
                  <p>Telefono: 0534 898304</p>
                  <h5>Orari</h5>
                  <ul class="list-unstyled">
                    <li>Martedì: Chiuso</li>
                    <li>Mercoledì: Chiuso</li>
                    <li>Giovedì: 09–17</li>
                    <li>Venerdì: 09–17</li>
                    <li>Sabato: 09–17</li>
                    <li>Domenica: 09–18</li>
                    <li>Pasqua: L'orario può variare</li>
                    <li>Lunedì: Chiuso</li>
                    <li>Lunedì dell'Angelo: Chiuso</li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
          
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
