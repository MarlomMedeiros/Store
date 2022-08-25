<div class="bg-white select-none relative inline-block m-1 w-72 h-[470px] cursor-pointer hover:drop-shadow-lg transition duration-300 rounded-md mt-4 border">
    <div class="m-16">
        <img src="{{ asset($img) }}" alt="{{ $title }}" title="{{ $title }}" class="w-full h-full">
    </div>
    <p class="font-bold mx-4 text-sm text-gray-700 max-h-16 overflow-ellipsis overflow-hidden">
        {{ $title }}
    </p>
    <div class="font-extrabold mx-4 text-xl text-orange-500">
        {{ $price }}
    </div>
    <div class="mx-4 font-medium text-xs text-gray-400">
        {{ $descont }}
    </div>
    <div class="uppercase h-10 mt-4 mb-4 absolute bottom-0 inset-x-0 cursor-pointer w-auto rounded-lg bg-orange-500 mx-2 font-extrabold mx-4 text-md flex items-center justify-center text-white">
        <x-icon.heroicons.solid.shopping-cart class="h-5 w-5 mr-1"/>
        {{ $button }}
    </div>
</div>