<x-app-layout>
    <div class="container py-5">
        
        {{-- Titolo categoria --}}
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h1 style="font-family: 'IM Fell English', serif; font-size: 3rem; color: #3c2e1d;">
                    {{ $category->name }}
                </h1>
                <a href="{{ route('menu.index') }}" class="text-decoration-none fw-bold" style="color: #7e2d19;">
                    Torna al menu completo
                </a>
            </div>
        </div>

        {{-- Piatti --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                @foreach($category->dishes as $dish)
                <div class="card mb-4 border-0 rounded-4 overflow-hidden" style="background-color: #f9f2e7; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="row g-0">
                        @if($dish->image)
                        <div class="col-md-4">
                            <div style="height: 200px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $dish->image) }}"
                                     class="w-100 h-100"
                                     style="object-fit: cover;"
                                     alt="{{ $dish->name }}">
                            </div>
                        </div>
                        @endif

                        {{-- Colonna destra: contenuto centrato --}}
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="w-100 px-4 py-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="fw-bold m-0 fs-4" style="font-family: 'IM Fell English', serif;">
                                        {{ $dish->name }}
                                    </h5>
                                    <span class="fs-5 fw-bold" style="color: #5c1f11;">
                                        {{ number_format($dish->price, 2) }}€
                                    </span>
                                </div>
                                <p class="text-muted small mb-2" style="font-style: italic;">
                                    {{ $dish->description }}
                                </p>
                                <div class="d-flex justify-content-end">
                                    @if($dish->is_vegan)
                                        <i class="fas fa-seedling text-success mx-1" title="Vegano"></i>
                                    @endif
                                    @if($dish->is_gluten_free)
                                        <i class="fas fa-wheat-awn-circle-exclamation text-warning mx-1" title="Senza Glutine"></i>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
