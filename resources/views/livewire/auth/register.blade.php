<div>
    <form class="flex flex-col px-8" wire:submit.prevent="submit">
        <a class="text-orange-500 my-4 flex mx-auto items-center uppercase justify-center font-bold text-2xl">
            Quero me Cadastrar
        </a>

        <x-input model="user.name" :name="'name'" label="Nome" :placeholder="'Nome *'" type="text" autocomplete="name"/>
        @error('user.name')
        <span class="text-base flex text-red-700 items-center">
                <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                {{ $message }}
            </span>
        @enderror
        <x-input model="user.email" :name="'email'" label="E-mail" :placeholder="'E-mail *'" type="text" autocomplete="email"/>
        @error('user.email')
        <span class="text-base flex text-red-700 items-center">
                <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                {{ $message }}
            </span>
        @enderror
        <x-input model="password" :name="'password'" label="Senha" :placeholder="'Senha *'" type="password" autocomplete="new-password"/>
        @error('password')
        <span class="text-base flex text-red-700 items-center">
                <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                {{ $message }}
            </span>
        @enderror
        <x-input model="confirmPassword" :name="'confirmPassword'" label="Confirme sua Senha" :placeholder="'Confirme sua Senha *'" type="password" autocomplete="new-password"/>
        @error('confirmPassword')
        <span class="text-base flex text-red-700 items-center">
                <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                {{ $message }}
            </span>
        @enderror
        <x-input model="user.identification" :name="'identification'" label="CPF ou CNPJ *" :placeholder="'123.XXX.XXX-XX ou 61.XXX.XXX/XXXX-XX'" type="identification" autocomplete="off"/>
        @error('user.identification')
        <span class="text-base flex text-red-700 items-center">
                <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                {{ $message }}
            </span>
        @enderror
        <x-input model="user.cep" :name="'cep'" label="CEP" :placeholder="'Ex: 00000-000'" type="cep" autocomplete="off"/>
        @error('user.cep')
            <span class="text-base flex text-red-700 items-center">
                <x-icon.heroicons.solid.exclamation-triangle class="w-5 h-5 mr-1"/>
                {{ $message }}
            </span>
        @enderror

        <div class="h-auto text-sm w-96">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <button wire:click="submit" type="button" class="border border-orange-500 rounded shadow h-12 my-5 uppercase font-bold hover:text-orange-600 text-orange-500">
            <div class="flex items-center justify-center">
                <x-icon.heroicons.outline.user-add class="w-6 h-6 mx-1"/>
                Cadastrar
            </div>
        </button>
    </form>
    <script>
        window.addEventListener('redirect', event => {
            setTimeout(function() {
                console.log('redirecting');
                window.location.href = event.detail.url;
            }, 2500);
        })
    </script>
</div>
