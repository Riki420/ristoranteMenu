<x-app-layout>
    <div class="container min-vh-100 py-4">
        <!-- Titolo -->
        <div class="text-center mb-4">
            <p class="text-dark fw-bold fs-1">Gestione dei Piatti</p>
            <hr class="border-light py-2">
        </div>
        <div>
            <a href="{{ route('dashboard') }}" class="btn-vintage px-4 py-2">
                   Indietro
            </a>
        </div>
    
        <!-- Messaggio di successo -->
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
    
        <!-- Filtro e pulsante aggiungi -->
        <div class="row mb-4">
            <div class="col-12 col-md-8 mx-auto">
                <form action="{{ route('admin.dishes.index') }}" method="GET" class="bg-dark p-3 rounded shadow d-flex flex-column flex-md-row align-items-md-end gap-3">
                    <div class="w-100">
                        <label for="category" class="form-label text-white">Filtra per Categoria</label>
                        <select name="category_id" id="category" class="form-select bg-secondary text-white border-0">
                            <option value="">Tutte le categorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-outline-light">Filtra</button>
                        <a href="{{ route('admin.dishes.create') }}" class="btn btn-outline-light">Aggiungi Piatto</a>
                    </div>
                </form>
            </div>
        </div>
    
        <!-- Tabella -->
        @if($dishes->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-dark table-striped table-bordered align-middle text-center shadow-sm rounded">
                    <thead class="table-secondary text-dark">
                        <tr>
                            <th>Disponibile</th>
                            <th>Nome</th>
                            <th>Descrizione</th>
                            <th>Prezzo</th>
                            <th>Categorie</th>
                            <th>Vegano</th>
                            <th>Gluten Free</th>
                            <th>Immagine</th>
                            <th>Azione</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dishes as $dish)
                        <tr>
                                <td>
                                    <!-- Toggle Visibilità -->
                                    <form action="{{ route('admin.dishes.toggleVisibility', $dish->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <label class="switch">
                                            <input type="checkbox" name="is_visible" 
                                                onchange="this.form.submit()" 
                                                {{ $dish->is_visible ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </td>
                                <td class="fw-semibold">{{ $dish->name }}</td>
                                <td>{{ $dish->description }}</td>
                                <td>{{ $dish->price }} €</td>
                                <td>
                                    @foreach($dish->categories as $category)
                                        <span class="badge bg-secondary">{{ $category->name }}</span>
                                    @endforeach
                                </td>
                                <!-- VEGAN -->
                                <td>
                                    <form action="{{ route('admin.dishes.toggleVegan', $dish->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $dish->is_vegan ? 'btn-success' : 'btn-outline-secondary' }}">
                                            <i class="fa-solid fa-leaf"></i>
                                        </button>
                                    </form>
                                </td>
                                <!-- Gluten Free -->
                                <td>
                                    <form action="{{ route('admin.dishes.toggleGlutenFree', $dish->id) }}" method="POST" class="mt-1">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $dish->is_gluten_free ? 'btn-warning' : 'btn-outline-secondary' }}">
                                            <i class="fa-solid fa-wheat-awn-circle-exclamation"></i>
                                        </button>
                                    </form>
                                </td>
                                <!-- IMG -->
                                <td>
                                    @if ($dish->image)
                                        <img src="{{ asset('storage/' . $dish->image) }}" style="max-width: 100px;" class="img-fluid rounded shadow-sm">
                                    @else
                                        <em class="text-muted">Nessuna immagine</em>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-sm btn-outline-warning">Modifica</a>
                                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Elimina</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center mt-4">
                <p class="text-light fs-5">Nessun piatto disponibile.</p>
            </div>
        @endif
    </div>
    
</x-app-layout>
