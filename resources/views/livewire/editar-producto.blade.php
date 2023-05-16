<div>
    <h1 class="text-3xl uppercase mb-4">{{$product->nombre}}</h1>
    <p>Aqui puedes editar las cantidades o agregar otra foto</p>
    <div class="md:grid md:grid-cols-3 gap-12 mt-10 ">
        @forelse ($product->product_image as $image )
            <div class="w-full">
                <img src=" {{ asset('storage/product_images/'. $image->imagen) }} " alt="imagen"  class=" h-2 rounded-lg">
            </div>
            
        @empty
            <p>Agrega alguna imagen del producto!</p>
        @endforelse 
    </div>
    <form action="">
        <div>
            <x-input-label for="product_image" :value="__('Imagen del producto')" />
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
</div>
