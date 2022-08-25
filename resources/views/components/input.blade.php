<div class="relative group" x-data="{
    focus: false,
    havetext: false,
    init() {
        setTimeout(() => {
           if (document.getElementById('{{ $name }}').matches(':-internal-autofill-selected')) {
                this.focus = true;
           }
        }, 50);
    }}">
    <label
            wire:key="{{ $name . 'label' }}"
            for="{{ $name }}"
            class="absolute transition-width delay-50 duration-100 select-none top-4 ml-4"
            x-bind:class="{ 'absolute transition-width delay-50 duration-200 text-normal select-none top-4 ml-3': !focus,
            'absolute select-none transition-width delay-50 duration-300 bg-white text-blue-500 text-bold text-xs px-0.5 top-0 ml-2.5': focus,
            'absolute select-none transition-width delay-50 duration-300 bg-white text-normal text-xs px-0.5 top-0 ml-2.5' : havetext}">
            {{ $label }}
    </label>
    <input
            wire:key="{{ $name . 'input' }}"
            wire:model.defer="{{ $model }}"
            x-bind:placeholder="focus ? '{{ $placeholder }}' : ''"
            x-ref="{{ $name }}"
            id="{{ $name }}"
            name="{{ $name }}"
            class="border border-gray-400 rounded pl-4 pb-1 group-text-gray-600 outline-black font-normal my-1.5 h-11 w-[400px]"
            x-bind:class="{ 'border border-gray-400 rounded pl-4 pb-1 group-text-gray-600 outline-black font-normal my-1.5 h-11 w-[400px]': !focus,
             'border border-blue-500 outline-blue-500 rounded pl-4 pb-1 group-text-gray-600 font-normal my-1.5 h-11 w-[400px]': focus,
             'border border-gray-400 transition-width delay-50 duration-500 outline-black rounded pl-4 pb-1 group-text-gray-600 font-normal my-1.5 h-11 w-[400px]' : havetext}"
            x-on:focusout="focus = false; havetext= $el.value.length ? true : false"
            x-on:focus="focus = true" type="{{ $type }}">
</div>