<x-app-layout>
    <div class="container vh-100">
        <div class="row justify-content-center">
            <div class="col-12 text-center py-4">
                <p class="fs-1 text-white"><b>Menù del Ristorante</b></p>
            </div>
        </div>
        <hr class="py-2 text-white">

        <div class="row justify-content-center">
            @foreach($categories as $category)
                @if($category->dishes->count() > 0) <!-- Verifica se la categoria ha piatti visibili -->
                    <div class="col-12 py-2 d-flex justify-content-center">
                        <a href="{{ route('menu.category', $category->id) }}" class="btn btn-outline-light w-25 text-white btn-lg text-uppercase">
                            <b>{{ $category->name }}</b>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
