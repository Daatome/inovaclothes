<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href={{ route('dashboard') }} class="bg-indigo-700 p-5 mb-10 rounded-lg hover:bg-indigo-800 cursor-pointer text-white font-bold">Regresar </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:editar-producto :product="$product" />
                </div>
            </div>
        </div>
    </div>
    

    
</x-app-layout>
