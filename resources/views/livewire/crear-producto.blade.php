<div>
    <h1 class="text-3xl">Crear un  nuevo producto</h1>
    <p>Crearás un nuevo producto, posteriormente añadirás cantidades a las tallas</p>

    <form action="" class="mt-20" wire:submit.prevent='crearProducto'>
        <div class="md:flex md:justify-between md:items-center py-5 gap-9">
            <div class="md:flex-1 me-10 mb-8 md:mb-0">
                <div class="mb-4" >
                    <x-input-label for="product_name" :value="__('Nombre del producto')" />
                    <x-text-input id="product_name" class="block mt-1 w-full" type="text" name="product_name" :value="old('product_name')" required autofocus/>
                    <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="product_price" :value="__('Precio del producto')" />
                    <x-text-input id="product_price" class="block mt-1 w-full " type="number" name="product_price" :value="old('product_price')" required autofocus/>
                    <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                </div>
            </div>
            <div>
                <x-input-label for="product_image" :value="__('Imagen del producto')" />
                <x-text-input id="product_image" class="block mt-1 max-w-xs " type="file"  name="product_image" :value="old('product_image')" required autofocus/>
                <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
            </div>
        </div>
        <x-primary-button class="ml-3 mt-5">
            {{ __('Crear Producto') }}
        </x-primary-button>
            
        
</div>
