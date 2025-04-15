<x-app-layout>
    <div class="container vh-100">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="py-4">
                    <p class="fs-1 text-white"><b>Gestione Categorie</b></h1>
                    </div>
                </div>
            <hr class="py-2 text-white">
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-end">
            <div class="col d-flex justify-content-end">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-light mb-3">Aggiungi Categoria</a>
            </div>
        </div>

        @if($categories->isNotEmpty()) <!-- Verifica se ci sono categorie -->
        <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered align-middle">
                <thead class="text-center">
                    <tr>
                        <th>Nome Categoria</th>
                        <th>Azione</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-white">{{ $category->name }}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline-warning btn-sm">Modifica</a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Elimina</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
            
        @else
            <p>Nessuna categoria disponibile.</p> <!-- Messaggio se non ci sono categorie -->
        @endif
    </div>
</x-app-layout>