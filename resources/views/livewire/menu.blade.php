<div x-data="{open: false}" x-on:mouseover="open = true" x-on:click="open = true" x-on:change="open = false" x-on:mouseleave="open = false" x-on:mousenter="open = true" class="h-full flex justify-center items-center align-middle cursor-pointer hover:bg-orange-600 text-center p-0.5 px-8 relative">
    <p class="select-none">
        DEPARTAMENTOS
    </p>
    <div x-cloak x-show="open">
        <div class="absolute left-0 top-10">
            <div class="transition-all bg-white w-48 h-96">
                @foreach($categories as $category)
                    <div wire:mouseover.debounce.150ms="loadSubcategories({{ $category->id }})" class="cursor-pointer text-neutral-700 font-medium normal-case text-left block p-1.5 pl-3 text-sm hover:bg-gray-100">
                        {{ $category->name }}
                    </div>
                @endforeach
            </div>
        </div>
        @isset($subcategories)
            <div class="absolute top-10 left-48 border-l">
                <div class="transition-all bg-white w-48 h-96">
                    @foreach($subcategories as $subcategory)
                        <div wire:mouseover="loadProducts({{ $subcategory->id }})" class="cursor-pointer text-neutral-700 font-medium normal-case text-left block p-1.5 pl-3 text-sm hover:bg-gray-100">
                            {{ $subcategory->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endisset
        @isset($products)
            <div class="absolute top-10 left-[375px] border-l">
                <div class="transition-all bg-white w-48 h-96 rounded-r">
                    @foreach($products as $product)
                        <a href="{{ route ('product', ['product' => $product->id, 'name' => $product->name]) }}" class="cursor-pointer text-neutral-700 font-medium normal-case text-left block p-1.5 pl-3 text-sm hover:bg-gray-100">
                            {{ $product->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endisset
    </div>
</div>
