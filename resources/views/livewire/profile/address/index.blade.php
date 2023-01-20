<div class="bg-white h-[600px] w-auto relative rounded lg:col-span-1 col-span-2">
    <div class="p-4 font-bold font-bold flex">
        <x-icon.heroicons.solid.map-pin class="text-orange-600 w-7 h-7 mx-1"/>
        ENDEREÇOS
    </div>
    @switch($editMode)
        @case(1)
            <div class="flex-col gap-2">
                <div class="h-[406px] overflow-auto">
                    @if(!$addresses->count())
                        <div class="w-[600px] h-[200px] mt-8 bg-gray-50 border shadow rounded-md mx-auto">
                            <div class="flex justify-center mx-5 mt-8 mb-2">
                                <span>
                                    Adicione pelo menos um Endereço padrão.
                                </span>
                            </div>
                            <div class="flex justify-center mx-5">
                                <button wire:click="$set('editMode', '3')" class="p-3 px-8 flex items-center bg-orange-500 font-extrabold text-white rounded">
                                    <x-icon.heroicons.solid.plus-cicle class="text-white w-5 h-5 mx-1"/>
                                    NOVO ENDEREÇO
                                </button>
                            </div>
                        </div>
                    @endif
                    @foreach($addresses as $address)
                        <div class="@if($address->default) bg-orange-100 @else bg-white @endif border-l-4 rounded border-orange-500 h-[130px]" wire:key="{{ uniqid() }}">
                            <div class="m-1 p-3 font-normal text-sm relative">
                                <div class="my-1.5 font-bold text-base">
                                    {{ $address->name }}
                                </div>
                                {{ $address->street }}<br>
                                {{ $address->full_address }}<br>
                                CEP {{ $address->cep }} - {{ $address->city }}, {{ $address->state }}
                                <div wire:click="mainAddress({{ $address }})" class="@if($address->default) text-orange-600 @else text-gray-400 cursor-pointer @endif select-none font-[550] text-base absolute right-2 top-4">
                                    {{ $address->default ? '(PADRÃO)' : 'DEIXAR PADRÃO' }}
                                </div>
                                <div class="cursor-pointer text-gray-400 cursor-pointer font-[550] text-xs absolute right-3 bottom-0">
                                    <livewire:profile.address.delete :address="$address" wire:key="{{ uniqid() }}" />
                                </div>
                                <div wire:click="editMode({{ $address }})" class="cursor-pointer text-gray-400 cursor-pointer font-[550] text-xs absolute right-16 bottom-0">
                                    EDITAR
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($addresses->count())
                    <div class="flex justify-end mx-5 my-16">
                        <button wire:click="$set('editMode', '3')" class="p-3 px-8 flex items-center bg-orange-500 font-extrabold text-white rounded">
                            <x-icon.heroicons.solid.plus-cicle class="text-white w-5 h-5 mx-1"/>
                            NOVO ENDEREÇO
                        </button>
                    </div>
                @endif
            </div>
            @break
    @case(2)
        <livewire:profile.address.edit />
        @break
    @case(3)
        <livewire:profile.address.create :user="$this->user" />
        @break
    @endswitch
</div>
