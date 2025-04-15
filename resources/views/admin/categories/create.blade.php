<x-app-layout>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="w-100" style="max-width: 500px;">
            <div class="text-center mb-4">
                <p class="text-white fw-bold fs-1">Crea Categoria</p>
                <hr class="border-light">
            </div>
    
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
    
            <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-dark p-4 rounded shadow">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label text-white fs-5">Nome Categoria</label>
                    <input type="text" name="name" id="name" class="form-control bg-secondary text-white border-0" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-light">Aggiungi Categoria</button>
                </div>
            </form>
        </div>
    </div>
    
</x-app-layout>
