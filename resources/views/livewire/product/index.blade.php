<div class="bg-[#F2F3F4]">
    <div class="transition-all rounded-md flex grid divide-y mt-2 pb-4 bg-white">
    {{--    <div class="col-span-2">--}}
    {{--        <p class="py-3 font-bold font-black">--}}
    {{--            Você está em:--}}
    {{--            <a class="font-normal mr-28">--}}
    {{--                Hardware > Processadores > Processador AMD > Código: 320799--}}
    {{--            </a>--}}
    {{--        </p>--}}
    {{--    </div>--}}
        <div class="transition-all  grid-rows-1 col-span-2 mx-auto p-auto">
            <p class="transition-all pt-8 font-bold text-2xl">
                {{ $product->name }}
            </p>
            <div class="transition-all flex flex-wrap">
                <div class="transition-all max-w-sm max-h-sm mx-auto md:mx-0">
                    <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                </div>
                <div class="transition-all lg:ml-44 ml-4 mt-8 w-[300px]">
                    <div>
                        <a>Vendido e entregue por: <a class="font-bold">Nome da Loja</a> | <a class="font-bold text-green-600">Em estoque</a></a>
                    </div>
                    <div class="transition-all md:flex mt-2">
                        <a class="transition-all flex-none text-orange-500 xl:mr-60 mr-8 font-black text-4xl">
                            R$ {{ $product->price }}
                        </a>
                        <div class="transition-all my-2 flex items-center justify-center">
                            <x-button class="rounded-md bg-orange-500 lg:w-42 lg:h-12 lg:px-4 w-full h-full py-2"/>
                        </div>
                    </div>
                    <div>
                        <a>
                            À vista no PIX com até
                            <a class="text-gray-600 font-bold">
                                7% OFF
                            </a>
                        </a>
                    </div>
                    <div class="mt-2">
                        <a class="font-bold text-gray-600">
                            R$ 8.747,30
                        </a>
                    </div>
                    <div class="">
                        Em até 10x de <a class="text-gray-600 font-bold">
                            R$ 874,72
                        </a> sem juros no cartão
                    </div>
                    <div class="">
                        Ou em 1x no cartão com até
                        <a class="text-gray-600 font-bold">
                            7% OFF
                        </a>
                    </div>
                    <div class="mt-2">
                        <a class="cursor-pointer underline">
                            Ver mais opções de pagamento
                        </a>
                    </div>
                    <div class="transition-all flex justify-center items-center mt-4 w-72">
                        <x-input model="a" :name="'CEP'" label="CEP" :placeholder="'Inserir CEP'" type="text" autocomplete="none"/>
                        <button class="ml-2 rounded-md bg-white border border-orange-600 h-11 w-40">
                            <a class="flex items-center justify-center text-base uppercase font-bold text-orange-600">
                                <x-icon.heroicons.solid.map-pin class="w-6 h-6"/>
                                Procurar
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-8 rounded-md shadow-md transition-all bg-white w-full h-auto">
        <a class="lg:p-6 p-2 flex items-center font-bold text-2xl lg:ml-32 ml-4 text-black uppercase">
            <x-icon.heroicons.solid.document-text class="w-6 h-6 mr-2 !text-orange-600"/>
            Descrição do Produto
        </a>
        <div class="p-6 pt-1 lg:ml-32 ml-4 lg:text-md text-sm">
            {!! $product->description !!}
        </div>
    </div>
    <div class="my-8 rounded-md shadow-md transition-all bg-white w-full h-auto">
        <a class="lg:p-6 p-2 flex items-center font-bold text-2xl lg:ml-32 ml-4 text-black uppercase">
            <x-icon.heroicons.solid.exclamation-circle class="w-6 h-6 mr-2 !text-orange-600"/>
            INFORMAÇÕES TECNICAS
        </a>
        <div class="p-6 pt-1 lg:ml-32 ml-4 lg:text-md text-sm">
            {!! $product->details !!}
        </div>
    </div>
</div>