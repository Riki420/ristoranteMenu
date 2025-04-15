<x-app-layout>
<div class="container vh-100">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="py-4">
                <p class="fs-1 text-white">Modifica il Piatto</h1>
                </div>
            </div>
        <hr class="py-2 text-white">
    </div>

    <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="row">
            {{-- Colonna sinistra: Informazioni testuali --}}
            <div class="col-md-7">
                <div class="form-group mb-3">
                    <label for="name">Nome Piatto</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $dish->name) }}" required>
                </div>
    
                <div class="form-group mb-3">
                    <label for="price">Prezzo</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $dish->price) }}" required>
                </div>
    
                <div class="form-group mb-3">
                    <label for="description">Descrizione</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $dish->description) }}</textarea>
                </div>
    
                <div class="form-group mb-3">
                    <label for="image">Immagine</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <!-- Visibility -->
                <div class="form-group mb-3">
                    <label for="is_visible" class="text-white fs-4 py-2">Disponibilità</label>
                    <input type="checkbox" name="is_visible" id="is_visible" class="form-check-input" 
                           {{ $dish->is_visible ? 'checked' : '' }}>
                    <label for="is_visible" class="form-check-label text-white">Visibile nel menu</label>
                </div>
                <!-- Gluten and Vegan -->
                <div class="form-group mb-3">
                    <label class="text-white fs-4 py-2 d-block">Caratteristiche</label>
                
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="is_vegan" id="is_vegan" class="form-check-input" {{ old('is_vegan', $dish->is_vegan ?? false) ? 'checked' : '' }}>
                        <label for="is_vegan" class="form-check-label text-white">Vegano</label>
                    </div>
                
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="is_gluten_free" id="is_gluten_free" class="form-check-input" {{ old('is_gluten_free', $dish->is_gluten_free ?? false) ? 'checked' : '' }}>
                        <label for="is_gluten_free" class="form-check-label text-white">Senza Glutine</label>
                    </div>
                </div>
                
    
                <div class="form-group mb-3">
                    <label for="categories">Categorie</label>
                    <select name="category_ids[]" multiple class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $dish->categories->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
    
                <button type="submit" class="btn btn-primary mt-3">Aggiorna Piatto</button>
            </div>
    
            {{-- Colonna destra: Immagine --}}
            <div class="col-md-5 d-flex align-items-start justify-content-center">
                @if ($dish->image)
                    <img src="{{ asset('storage/' . $dish->image) }}" alt="Immagine Piatto" class="img-fluid rounded shadow" style="max-height: 300px;">
                @else
                    <div class="text-muted">Nessuna immagine disponibile</div>
                @endif
            </div>
        </div>
    </form>
    
</div>
</x-app-layout>
