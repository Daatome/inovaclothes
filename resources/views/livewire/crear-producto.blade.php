<div>
    <h1 class="text-3xl">Crear un  nuevo producto</h1>
    <p>Crearás un nuevo producto, posteriormente añadirás cantidades a las tallas</p>

    @if (session()->has('mensaje'))
        <p class="bg-green-500 border-l-2 border-green-600 text-black font-bold">{{session('mensaje')}}</p>
    @endif

    <form action="" class="mt-20" wire:submit.prevent='crearProducto'>
        <div class="md:flex md:justify-between md:items-center py-5 gap-9">
            <div class="md:flex-1 me-10 mb-8 md:mb-0">
                <div class="mb-4" >
                    <x-input-label for="product_name" :value="__('Nombre del producto')" />
                    <x-text-input id="product_name" class="block mt-1 w-full" type="text" name="product_name" :value="old('product_name')" wire:model='product_name' autofocus/>
                    <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="product_price" :value="__('Precio del producto')" />
                    <x-text-input id="product_price" class="block mt-1 w-full " type="number" name="product_price" :value="old('product_price')" wire:model='product_price' autofocus/>
                    <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                </div>
            </div>
            <div>
                <x-input-label for="product_image" :value="__('Imagen del producto')" />
                <x-text-input id="product_image" class="block mt-1 max-w-xs " type="file"  name="product_image" :value="old('product_image')" accept="image/**" wire:model='product_image' autofocus/>
                <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
                @if ($product_image)
                    <img src="{{ $product_image->temporaryUrl() }}" class="w-32">
                @endif
            </div>
        </div>
        <x-primary-button class="ml-3 mt-5">
            {{ __('Crear Producto') }}
        </x-primary-button>
            
        
</div>
