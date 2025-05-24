<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            @foreach($categories as $category)
                @if($category->dishes->count() > 0)
                    <div class="col-12 py-2 d-flex justify-content-center">
                        <a href="{{ route('menu.category', $category->id) }}" class="btn btn-vintage text-uppercase px-5 py-2">
                            <b>{{ $category->name }}</b>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
