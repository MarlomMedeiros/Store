<form x-cloak x-data="{ open: @entangle('open') }" @modalshow.window="open = true;" x-show="open" wire:submit.prevent="save" x-transition class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-2 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg pt-2 bg-white text-left shadow-xl transition-all sm:my-4 sm:w-full sm:max-w-lg">
                <div class="ml-5 font-bold">
                    Mudar a Senha
                </div>
                <div class="alert alert-danger">
                    <ul>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li class="flex items-center ml-5 text-sm">
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
                <div class="bg-white px-4 pt-1 pb-4 sm:p-4 sm:pb-4">
                    <div class="sm:items-start">
                            <x-input name="password" label="Senha Atual *" model="password" placeholder="Senha Atual *" type="password"  autocomplete="none"/>
                            <x-input name="new-password" label="Nova Senha *" model="newPassword" placeholder="Nova Senha *" type="password"  autocomplete="none"/>
                            <x-input name="new-password-confirm" label="Confirmação da Nova Senha *" model="confirmPassword" placeholder="Confirmação da Nova Senha *" type="password"  autocomplete="none"/>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button x-on:click="open = false" type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                    <button wire:click="save" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Mudar</button>
                </div>
            </div>
        </div>
    </div>
</form>
