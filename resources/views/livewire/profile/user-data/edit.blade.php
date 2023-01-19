<div>
    <div class="relative bg-white lg:ml-16 h-[600px] rounded lg:col-span-1 col-span-2">
        <div class="relative p-5 py-4 font-bold flex">
            <x-icon.heroicons.solid.document-text class="text-orange-600 w-7 h-7 mx-1"/>
            DADOS BÁSICOS
            <button wire:click="$emit('showModal')" type="button" class="absolute right-4 bg-white text-sm text-orange-600 font-semibold border border-orange-500 rounded p-1 px-5">
                Alterar senha
            </button>
        </div>
        <div class="alert alert-danger">
            <ul>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li class="flex gap-1 ml-5">
                            <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                            {{ $error }}
                        </li>
                    @endforeach
                @endif
                @if (session()->has('message'))
                    <li class="flex items-center ml-5 text-sm">
                        <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                        {{ session('message') }}
                    </li>
                @endif
            </ul>
        </div>
        <form class="p-5 py-2 w-flex w-auto" wire:submit.prevent="submit">
            <x-input disabled name="fullname" label="Nome Completo *" model="user.name" placeholder="Nome Completo *" type="text"/>
            <x-input disabled name="email" label="E-mail *" model="user.email" placeholder="E-mail *" type="email"/>
            <x-input disabled model="user.identification" :name="'identification'" label="CPF ou CNPJ *" :placeholder="'CPF ou CNPJ *'" type="identification"/>
            <x-input name="birthday" label="Data de nascimento" model="user.birthday" placeholder="Data de nascimento" type="date"/>
            <x-input name="cellphone" label="Telefone celular" model="user.cellphone" placeholder="Telefone celular" type="cellphone"/>
        </form>
        <div x-data="{ open: @entangle('user.send_offers') }" class="flex gap-1 border-orange-500 mx-5">
            <input wire:model.defer="user.send_offers" x-model="open" value="checkbox" type="checkbox" id="scales" name="scales" class="w-5 h-5">
            <label for="scales"></label>
            <div class="flex cursor-pointer" x-on:click="open =! open">
                Quero receber ofertas e novidades por e-mail, SMS, Whatsapp
            </div>
        </div>
        <div class="flex justify-end mx-5 my-16">
            <button wire:click="save" type="button" class="p-3 px-10 bg-orange-500 font-extrabold text-white bottom-32 right-4 rounded">
                SALVAR
            </button>
        </div>
    </div>
    <livewire:profile.user-data.modal-password/>
</div>
