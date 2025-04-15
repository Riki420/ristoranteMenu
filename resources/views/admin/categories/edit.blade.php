<x-app-layout>
    <div class="container vh-100">
        <h1>Modifica Categoria</h1>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome Categoria</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Aggiorna Categoria</button>
        </form>
    </div>

</x-app-layout>