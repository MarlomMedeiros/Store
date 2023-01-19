<div class="grid grid-cols-4">
    <div class="col-span-4 flex items-center gap-1.5 my-8 ml-40">
        <p class="font-bold"> Você pesquisou por: </p>
        Gabinete Sharkoon Elite Shark, Full Tower, Lateral em Vidro Temperado, 4x Fans RGB, Preto CA300T
    </div>
    <div class="ml-40">
        <p class="font-bold text-lg"> Categorias relacionadas </p>
        <div class="font-normal text-sm mt-1.5">
            <ul>
                <li>Coffee</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Coffee</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Coffee</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Coffee</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
                <li>Tea</li>
                <li>Milk</li>
            </ul>
        </div>
    </div>
    <div class="col-span-3">
        <div class="flex items-center gap-8">
            <div class="flex items-center justify-center gap-2 text-neutral-900">
                <p class="font-bold">
                    Ordenar:
                </p>
                <select class="p-2.5 pr-48 rounded-m" wire:model="type">
                    <option value="0">Escolha</option>
                    <option value="1">Preço crescente</option>
                    <option value="2">Preço descrecente</option>
                    <option value="3">Mais Recentes</option>
                </select>
            </div>
            <div class="flex items-center gap-2 text-neutral-900">
                <p class="font-bold">
                    Exibir:
                </p>
                <select class="p-2.5 pr-48 rounded-m" wire:model="showCount">
                    <option value="20">20 por página</option>
                    <option value="40">40 por página</option>
                    <option value="60">60 por página</option>
                    <option value="80">80 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
            <div class="flex items-center gap-1">
                <p class="font-bold">{{ $products->count() }}</p><p>{{ ($products->count() == 1 ? ' produto' : ' produtos') }}</p>
            </div>
        </div>
        <div class="w-auto h-auto flex flex-wrap">
            @foreach($products as $product)
                <x-store.product
                    :img="$product->photo"
                    :title="$product->name"
                    :price="$product->price"
                    :descont="'À vista no PIX'"
                    :button="'Comprar'"
                    :action="route ('product', ['product' => $product->id, 'name' => $product->name])"
                />
            @endforeach
        </div>
        <div>
            {{ $products->links() }}
        </div>
    </div>
</div>
