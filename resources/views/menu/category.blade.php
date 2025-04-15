<x-app-layout>
    <hr class="py-5 text-white">
    <div class="container vh-100">

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="py-4">
                    <p class="fs-1 text-white">{{ $category->name }}</p>
                    </div>
                </div>
                <a href="{{ route('menu.index') }}" class="text-danger fs-4 text-end px-4">Torna al menu completo</a>
            <hr class="py-2 text-white">
        </div>
        
        <div class="row py-2">
            @foreach($category->dishes as $dish)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card bg-dark text-white shadow-sm border-0 h-100">
                    @if($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}" class="card-img-top" style="object-fit: cover; height: 200px;" alt="{{ $dish->name }}">
                    @endif
                    <div class="card-body bg-white text-dark d-flex flex-column">
                        <h5 class="card-title text-center mb-2">{{ $dish->name }}</h5>
                        <hr>
                        <p class="card-text text-center text-muted flex-grow-1">{{ $dish->description }}</p>
                    </div>
                    <div class="card-footer bg-light text-center  border-top border-1 border-secondary text-dark">
                        <span class="fw-bold">{{ number_format($dish->price, 2) }}€</span>
                        <div>
                            @if($dish->is_vegan)
                                <i class="fas fa-seedling text-success" title="Vegano"></i>
                            @endif
                            @if($dish->is_gluten_free)
                                <i class="fas fa-solid fa-wheat-awn-circle-exclamation text-warning" title="Senza Glutine"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                       
            @endforeach
        </div>


    </div>
</x-app-layout>

