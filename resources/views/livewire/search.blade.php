<div x-data="{open: false}" class="block w-full lg:w-1/3">
    <label class="relative z-20">
        <div x-on:focusin="open=true" x-on:keydown.esc="open = false" x-on:focusout="open=false">
            <x-icon.heroicons.solid.search viewBox="0 -4 30 30" class="w-9 h-11 absolute inset-y-0 rounded-r-lg -right-[52px] bg-white flex items-center cursor-pointer"/>
            <input x-on:input="open = true" wire:model.debounce="search" type="search" class="ml-4 shadow-[0_20px_25px_-5px_rgba(0,0,0,0.1)] h-max placeholder:text-lg placeholder:text-gray-500 w-full bg-white rounded-l-lg py-3 pl-4 focus:outline-none text-sm" placeholder="busque aqui" name="search"/>
            <div x-cloak x-show="open" x-transition class="bg-white left-4 top-12 rounded-md absolute w-[636px] h-auto shadow">
                @foreach($results as $result)
                    <a href="{{ route ('product', ['product' => $result->id, 'name' => $result->name]) }}" class="flex items-center p-2 rounded-md hover:bg-gray-50">
                        <img src="{{ asset($result->photo) }}" alt="{{ $result->name }}" class="w-10 h-10 object-cover"/>
                        <div class="ml-4">
                            <p class="text-sm font-bold text-gray-700">{{ $result->name }}</p>
                            <p class="text-sm text-gray-500">R$ {{ number_format($result->price, 2, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
                @if(!$results->total())
                    <p class="flex items-center p-2 rounded-md text-sm font-bold text-gray-700">Nenhum resultado encontrado</p>
                @endif
            </div>
        </div>
    </label>
    <div x-show="open" class="absolute z-10 bg-black opacity-40 w-full h-auto left-0 right-0 bottom-0 top-0"></div>
</div>