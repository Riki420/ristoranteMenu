<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="font-semibold text-xl text-white leading-tight fs-2 mb-4">
                {{ __('Dashboard') }}
            </p>
            <hr class="py-4 text-white">
            <div class="container vh-100 bg-dark">
                <div class="row">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 py-4">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-light px-4 py-2">
                                Gestione Categorie
                            </a>
                            <a href="{{ route('admin.dishes.index') }}" class="btn btn-outline-light px-4 py-2">
                                Gestione Piatti
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    <div class="container py-2">
            <div class="text-center">
                <a href="{{ route('menu.index') }}" class="btn btn-vintage mb-3">
                Apri il Menù
                </a>
            </div>
            <hr>
            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 py-4">
                <a href="{{ route('admin.categories.index') }}" class="btn-vintage px-4 py-2">
                Gestione Categorie
                </a>
                <a href="{{ route('admin.dishes.index') }}" class="btn-vintage px-4 py-2">
                    Gestione Piatti
                </a>
            </div>
        
                
        </div>    
    
</x-app-layout>
