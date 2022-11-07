<div class="transition-all h-auto w-auto mx-32 mt-4 mb-[400px] relative grid-cols-1 bg-white">
    <div class="p-4 relative flex items-center font-bold text-xl text-black uppercase">
        <x-icon.heroicons.solid.shopping-cart class="!text-orange-500 h-5 w-5 mr-2"/>
        PRODUTO E FRETE
        <div wire:click="clearCookie()">
            <div class="outline outline-offset-2 outline-1 rounded-sm flex w-[150px] h-[30px] outline-red-500 text-xs justify-center cursor-pointer items-center absolute right-4 top-4">
                <div>
                    <x-icon.heroicons.solid.trash class="!text-red-500 h-5 w-5"/>
                </div>
                <p class="!text-red-500 ml-1">
                    Limpar carrinho
                </p>
            </div>
        </div>
    </div>
    <div class="mx-4">
        @foreach($cartItems as $product)
            <div class="border-t mt-4"/>
            <div wire:key="{{ $product->id }}" id="{{ $product->id }}" class="flex items-center justify-between">
                <div class="flex items-center transition-all px-2 mx-auto md:mx-0">
                    <div class="h-32 w-32">
                        <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                    </div>
                    <p class="text-sm ml-4 text-black max-w-md font-bold">
                        {{ $product->name }}
                    </p>
                </div>
                <div class="flex items-center justify-center justify-items-center grid grid-rows-1">
                    <div class="row-span-1 text-xs text-normal">
                        Quantidade
                    </div>
                    <div class="flex items-center justify-center">
                        <x-icon.heroicons.solid.chevron-left wire:click.prevent="setQuantity({{ $product->id }}, -1)" class="select-none cursor-pointer !text-orange-500 w-4 h-4"/>
                        <div class="row-span-1 text-gray-700 font-bold text-lg mx-4">
                            <div class="row-span-1 text-gray-700 font-bold text-lg mx-4">
                                {{ $this->getQuantity($product->id) }}
                            </div>
                        </div>
                        <x-icon.heroicons.solid.chevron-right wire:click.prevent="setQuantity({{ $product->id }}, +1)" class="select-none cursor-pointer !text-orange-500 w-4 h-4"/>
                    </div>
                </div>

                <div class="flex items-center justify-center justify-items-end grid grid-rows-1">
                    <div class="row-span-1 text-normal text-xs">
                        Preço à vista no PIX:
                    </div>
                    <div class="text-gray-700 text-lg font-extrabold text-orange-500">
                        R$ {{ number_format($product->price,2,",",".") }}
                    </div>
                </div>
                <div wire:click="removeCartItem({{ $product->id }})">
                    <button type="button">
                        <x-icon.heroicons.solid.trash class="!text-red-500 h-5 w-5 mr-4"/>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>