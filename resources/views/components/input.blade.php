@props([
    'name',
    'label',
    'model',
    'placeholder',
    'type',
    'autocomplete',
    'pattern' => null,
    'disabled' => false,
    'required' => false
])

<div class="relative group" wire:key="{{ uniqid() }}" x-data="{
    focus: false,
    havetext: false,

    init() {
        let input = document.getElementById('{{ $name }}')
        if('{{ $type }}' == 'cellphone') {
            let x = input.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,4})/);
            console.log(input.value.length)
            if (input.value.length < 12) {
                input.value =  !x[2] ? x[1] : '+' + x[1] + ' ' + (x[3].length > 4 ? '(' + x[2] + ')' : x[2] + '') + (x[3] ? ' ' + x[3] : '');
            } else {
                let x = input.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
                input.value =  !x[2] ? x[1] : '+' + x[1] + ' ' + (x[3].length > 4 ? '(' + x[2] + ')' : x[2] + '') + (x[3] ? ' ' + x[3] : '');
            }
        }
        if('{{ $type }}' == 'cep') {
            let x = input.value.replace(/\D/g, '').match(/(\d{0,5})(\d{0,3})/);
            input.value = !x[2] ? x[1] : x[1] + (x[2] ? '-' : '') + x[2];
        }
        if('{{ $type }}' == 'identification') {
            let x = input.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
            input.value = !x[2] ? x[1] : x[1] + '.' + x[2] + (x[3] ? '.' : '') + x[3] + (x[4] ? '/' : x[4]) + x[4] + (x[5] ? '-' + x[5] : '');
            if (input.value.length < 15) {
                x = input.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
                input.value = !x[2] ? x[1] : x[1] + '.' + x[2] + (x[3] ? '.' : '') + x[3] + (x[4] ? '-' + x[4] : '');
            }
            if (input.matches(':-internal-autofill-selected')) {
                    this.focus = true;
            }
            if (input.value.length > 0) {
                this.havetext = true;
            } else {
                this.havetext = false;
            }
        }
        setInterval(() => {
            if (input.matches(':-internal-autofill-selected')) {
                    this.focus = true;
            }
            if (input.value.length > 0) {
                this.havetext = true;
            } else {
                this.havetext = false;
            }
        }, 100)
    }}">
    @if($type != 'date')
        <label
                wire:key="{{ $name . 'label' }}"
                for="{{ $name }}"
                class="absolute transition-width duration-100 select-none top-4 ml-3"
                x-bind:class="{ 'absolute transition-width delay-50 duration-200 text-normal cursor-text select-none top-4 ml-3': !focus,
                'absolute select-none transition-width delay-50 duration-300 bg-white text-blue-500 text-bold text-xs px-0.5 top-0 ml-2.5': focus,
                'absolute select-none transition-width delay-50 duration-300 bg-white text-normal text-xs px-0.5 top-0 ml-2.5' : havetext}">
                {{ $label }}
        </label>
    @endif
    <input
            wire:key="{{ $name . 'input' }}"
            wire:model.defer="{{ $model }}"
            x-bind:placeholder="focus ? '{{ $placeholder }}' : ''"
            x-ref="{{ $name }}"
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $pattern }}
            autocomplete="off"
            class="border w-full border-gray-400 rounded pl-4 pb-1 group-text-gray-600 outline-black font-normal my-1.5 h-11"
            x-bind:class="{
            'border border-gray-400 rounded pl-4 pb-1 group-text-gray-600 outline-black font-normal my-1.5 h-11 w-full': !focus,
             'border border-blue-500 outline-blue-500 rounded pl-4 pb-1 group-text-gray-600 font-normal my-1.5 h-11 w-full': focus,
             'border border-gray-400 transition-width delay-50 duration-500 outline-black rounded pl-4 pb-1 group-text-gray-600 font-normal my-1.5 h-11 w-full' : havetext}"
            x-on:input="havetext = $event.target.value.length > 0"
            x-on:focusout="focus = false; havetext= $el.value.length ? true : false"
            x-on:focus="focus = true" type="{{ $type }}">

    @if($disabled)
        <x-icon.heroicons.solid.lock-closed viewBox="0 0 24 24" class="text-gray-500 w-6 h-6 absolute right-3 top-4"/>
    @endif
</div>

<script>
    if('{{ $type }}' == 'cep') {
        document.getElementById('{{ $name }}').addEventListener('input', function (e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,5})(\d{0,3})/);
            e.target.value = !x[2] ? x[1] : x[1] + (x[2] ? '-' : '') + x[2];
        });
    }
    if('{{ $type }}' == 'cellphone') {
        document.getElementById('{{ $name }}').addEventListener('input', function (e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,4})/);
            if (e.target.value.length < 12) {
                e.target.value =  !x[2] ? x[1] : '+' + x[1] + ' ' + (x[3].length > 4 ? '(' + x[2] + ')' : x[2] + '') + (x[3] ? ' ' + x[3] : '');
            } else {
                let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
                e.target.value =  !x[2] ? x[1] : '+' + x[1] + ' ' + (x[3].length > 4 ? '(' + x[2] + ')' : x[2] + '') + (x[3] ? ' ' + x[3] : '');
            }
        });
    }
    if('{{ $type }}' == 'identification') {
        document.getElementById('{{ $name }}').addEventListener('input', function (e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
            e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + (x[3] ? '.' : '') + x[3] + (x[4] ? '/' : x[4]) + x[4] + (x[5] ? '-' + x[5] : '');
            if (e.target.value.length < 15) {
                x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
                e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + (x[3] ? '.' : '') + x[3] + (x[4] ? '-' + x[4] : '');
            }
        });
    }
</script>
