<div>
    
    <div>
        @if (session()->has('mensaje'))
                <p class="bg-green-500 border-l-2 border-green-600 text-black font-bold">{{session('mensaje')}}</p>
        @endif
        <h1 class="text-3xl uppercase mb-4">{{$product->nombre}}</h1>
        <p>Aqui puedes editar la información del producto, agregar fotos y cantidades</p>
        
        <form wire:submit.prevent='addMerch'>
    
            <div class="mt-10">
                <h2 class="text-2xl">Información del producto</h2>
        
                <div class="mb-4" >
                    <x-input-label for="product_name" :value="__('Nombre del producto')" />
                    <x-text-input id="product_name" class="block mt-1 w-full" type="text"  :value="old('product_name')" wire:model='product_name'/>
                    <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                </div>
                <div class="mb-4" >
                    <x-input-label for="precio" :value="__('Precio')" />
                    <x-text-input id="precio" class="block mt-1 w-full" type="number"  :value="old('precio')" wire:model='precio'/>
                    <x-input-error :messages="$errors->get('precio')" class="mt-2" />
                </div>
    
                <h3 class="text-xl mt-10">Tallas y sus cantidades</h3>
                <p>Se muestran las cantidades actuales, puedes editarla</p>
                <div class="md:grid md:grid-cols-5 gap-12 mt-10 ">
                    
                    <div class="mb-4" >
                        <x-input-label for="xs" :value="__('XS')" class="text-center text-lg" />
                        <x-text-input id="xs" class="block mt-1 w-full" type="number"  :value="old('xs')" wire:model='xs'/>
                        <x-input-error :messages="$errors->get('xs')" class="mt-2" />
                    </div>
                    <div class="mb-4" >
                        <x-input-label for="s" :value="__('S')" class="text-center text-lg" />
                        <x-text-input id="s" class="block mt-1 w-full" type="number"  :value="old('s')" wire:model='s'/>
                        <x-input-error :messages="$errors->get('s')" class="mt-2" />
                    </div>
                    <div class="mb-4" >
                        <x-input-label for="m" :value="__('M')" class="text-center text-lg" />
                        <x-text-input id="m" class="block mt-1 w-full" type="number"  :value="old('m')" wire:model='m'/>
                        <x-input-error :messages="$errors->get('m')" class="mt-2" />
                    </div>
                    <div class="mb-4" >
                        <x-input-label for="l" :value="__('L')" class="text-center text-lg" />
                        <x-text-input id="l" class="block mt-1 w-full" type="number"  :value="old('l')" wire:model='l'/>
                        <x-input-error :messages="$errors->get('l')" class="mt-2" />
                    </div>
                    <div class="mb-4" >
                        <x-input-label for="xl" :value="__('XL')" class="text-center text-lg" />
                        <x-text-input id="xl" class="block mt-1 w-full" type="number"  :value="old('xl')" wire:model='xl'/>
                        <x-input-error :messages="$errors->get('xl')" class="mt-2" />
                    </div>
                </div>
            </div>
            <x-primary-button class="ml-3 mt-5">
                {{ __('Actualizar Información') }}
            </x-primary-button>
    
        </form>
        <div class="mt-10">
            <h2 class="text-2xl border-b-2 border-indigo-500">Agrega una imagen del producto</h2>
            <form  wire:submit.prevent='addImage'>
                <div class="mt-10">
                    <x-text-input id="product_image" class="block mt-1 max-w-xs " type="file"  name="product_image" :value="old('product_image')" accept="image/**" wire:model='product_image' autofocus/>
                    <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
                    @if ($product_image)
                        <img src="{{ $product_image->temporaryUrl() }}" class="w-32">
                    @endif
                </div>
                <x-primary-button class="ml-3 mt-5">
                    {{ __('Agregar imagen') }}
                </x-primary-button>
            </form>
            <div class="md:grid md:grid-cols-3 gap-12 mt-10 justify-between">
                @forelse ($product_images as $image )
                    <div class="w-full my-4">
                        <img src=" {{ asset('storage/product_images/'. $image->imagen) }} " alt="imagen"  class=" h-80 w-full rounded-lg">
                        <button wire:click="$emit('mostrarAlerta',{{ $image->id}})" class="bg-red-600 hover:bg-red-800 p-3 text-center text-white text-base rounded-lg">Eliminar</button>
                    </div>
                    
                @empty
                    <p>Agrega alguna imagen del producto!</p>
                @endforelse 
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        Livewire.on('mostrarAlerta', image =>{
                Swal.fire({
            title: '¿Estás seguro?',
            text: "No podras recuperar la imagen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarImagen', image);
                Swal.fire(
                'Elminado!',
                'Imagen eliminada',
                'success'
                )
            }
            }) 
        });

    </script>
@endpush
