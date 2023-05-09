<div class="container">
    <h1 class="text-3xl">Productos registrados</h1>
    <p>Aqui se encuentran los productos que has registrado, puedes dar click a cada uno y editar sus cantidades</p>

    <div class="md:grid md:grid-cols-3 gap-12 mt-10 ">
        @forelse ($products as $product)
            <div class=" rounded-lg bg-gray-600 p-5">
                <div class="w-full">
                    {{--we use just one image for this view, thats why the [0]. later we have to make a for each for the other images in the online shop--}}
                    <img src="{{asset('storage/product_images/'. $product->product_image[0]->imagen)}}" alt="imagen" class="w-full h-80 rounded-lg">
                </div>
                <p class="text-xl font-bold text-center">
                    {{$product->nombre}}
                </p>
                <p class="text-center">${{$product->precio}} </p>

                <div class="md:flex md:justify-between">

                    <a href="{{ route('editProduct', $product->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Ver detalles</a>
                    <button wire:click="$emit('mostrarAlerta',{{ $product->id}})" class="bg-red-600 hover:bg-red-800 p-3 text-center text-white text-base rounded-lg">Eliminar</button>
                </div>
                    
            </div>
            
        @empty
            <p>No tienes productos registrados</p>
        @endforelse
        
    </div>
    <div class="flex justify-center mt-5">{{$products->links()}} </div>
    
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        Livewire.on('mostrarAlerta', productId =>{
                Swal.fire({
            title: '¿Estás seguro?',
            text: "No podras recuperar la información del producto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarProducto', productId);
                Swal.fire(
                'Elminado!',
                'Producto elminado',
                'success'
                )
            }
            }) 
        });

    </script>
@endpush