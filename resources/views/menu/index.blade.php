<x-app-layout>
    <hr class="py-5 text-white">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($categories as $category)
                @if($category->dishes->count() > 0) <!-- Verifica se la categoria ha piatti visibili -->
                    <div class="col-12 py-2 d-flex justify-content-center">
                        <a href="{{ route('menu.category', $category->id) }}" class="btn btn-outline-light w-25 text-white text-uppercase">
                            <b>{{ $category->name }}</b>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
