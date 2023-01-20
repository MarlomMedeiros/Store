<div>
    <div class="alert alert-danger">
        <ul>
            @if ($errors->any())
                <li class="flex items-center gap-1 ml-5 text-sm">
                    <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                    {{ $errors->first() }}
                </li>
            @endif
            @if (session()->has('message'))
                <li class="flex items-center ml-5 text-sm">
                    <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                    {{ session('message') }}
                </li>
            @endif
        </ul>
    </div>
    <form class="p-5 py-2 w-flex w-auto" wire:submit.prevent="edit">
        <x-input name="nome" label="Nome *" model="address.name" placeholder="Nome *" type="text"/>
        <x-input name="street" label="Rua *" model="address.street" placeholder="Rua *" type="text"/>
        <x-input name="state" label="Estado *" model="address.state" placeholder="Estado *" type="text"/>
        <x-input name="city" label="Cidade *" model="address.city" placeholder="Cidade *" type="text"/>
        <x-input name="post_code" label="CEP *" model="address.post_code" placeholder="CEP *" type="text"/>
        <x-input name="full_address" label="Endereço Completo *" model="address.full_address" placeholder="Endereço Completo *" type="text"/>
        <di  class="flex gap-1 border-orange-500">
            <input wire:model="address.default" wire:click="$toggle('address.default')" value="checkbox" type="checkbox" id="scales" name="scales" class="w-5 h-5">
            <label for="scales"></label>
            <div class="flex cursor-pointer" wire:model="address.default" wire:click="$toggle('address.default')">
                Quero esse endereço como endereço padrão.
            </div>
        </di>
        <div class="flex justify-end mx-5 gap-4 my-16">
            <button wire:click="cancel" type="button" class="p-3 px-10 bg-orange-400 font-extrabold text-white bottom-32 right-4 rounded">
                CANCELAR
            </button>
            <button type="submit" class="p-3 px-10 bg-orange-500 font-extrabold text-white bottom-32 right-4 rounded">
                SALVAR
            </button>
        </div>
    </form>
</div>
