<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="py-4">
                    <p class="fs-1 text-white">Crea Nuovo Piatto</p>
                </div>
            </div>
            <hr class="py-2 text-white">
        </div>
    
        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                {{-- Colonna sinistra: Informazioni testuali --}}
                <div class="col-md-7">
                    <div class="form-group mb-3">
                        <label for="name" class="text-white fs-4 py-2">Nome Piatto</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
    
                    <div class="form-group mb-3">
                        <label for="price" class="text-white fs-4 py-2">Prezzo</label>
                        <input type="number" name="price" class="form-control" step="0.01" required>
                    </div>
    
                    <div class="form-group mb-3">
                        <label for="description" class="text-white fs-4 py-2">Descrizione</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <!-- 
                    <div class="form-group mb-3">
                        <label for="is_visible" class="text-white fs-4 py-2">Disponibilità</label>
                        <input type="checkbox" name="is_visible" id="is_visible" class="form-check-input" value="1" checked>
                    </div>
                     
                    <div class="form-group mb-3">
                        <label class="text-white fs-4 py-2 d-block">Caratteristiche</label>
                    
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="is_vegan" id="is_vegan">
                            <label class="form-check-label text-white" for="is_vegan">Piatto vegano</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="is_gluten_free" id="is_gluten_free">
                            <label class="form-check-label text-white" for="is_gluten_free">Senza glutine</label>
                        </div>
                    </div>
                    -->
    
                    <div class="form-group mb-3">
                        <label for="category_id" class="text-white fs-4 py-2">Categoria</label>
                        <select name="category_ids[]" class="form-control" required multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    
    
                    <div class="form-group mb-3">
                        <label for="image" class="text-white fs-4 py-2">Immagine</label>
                        <input type="file" name="image" class="form-control" id="imageInput" accept="image/*" onchange="previewImage()">
                        <div id="imagePreview" class="mt-3"></div>
                    </div>
                    
    
                    <button type="submit" class="btn btn-outline-light mt-3">Salva Piatto</button>
                </div>
    
                {{-- Colonna destra: Anteprima immagine --}}
                <div class="col-md-5 d-flex align-items-center justify-content-center">
                    <div class="text-muted" id="noImageSelected">Nessuna immagine selezionata</div>
                </div>
            </div>
        </form>
    
    </div>
    
   
</x-app-layout>
