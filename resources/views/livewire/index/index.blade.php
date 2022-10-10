<div class="bg-black">
    <div>
        <img src="{{ asset('images/banner.jpg') }}" alt="banner" class="w-auto h-auto mx-auto">
    </div>
    <div class="bg-[#F2F3F4] my-8 md:mx-32 w-auto h-auto flex flex-wrap justify-center inline-block">
        <div class="w-full h-16 font-extrabold pl-8 pt-4 uppercase text-lg text-white bg-orange-500">
            Melhores Produtos
        </div>
        <div class="w-auto h-auto mx-10 flex flex-wrap justify-center">

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

            <div class="h-auto w-auto my-8 drop-shadow-lg">
                <img src="{{ asset('images/banner2.jpg') }}" alt="banner" class="w-full h-auto items-center">
            </div>

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
        <div class="w-auto h-auto flex justify-center font-semibold text-white items-center bg-[#0060b1]">
        </div>
    </div>
</div>