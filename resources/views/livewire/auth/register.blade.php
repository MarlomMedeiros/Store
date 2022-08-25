<form class="flex flex-col px-8" wire:submit.prevent="submit">
    <a class="text-orange-500 my-4 flex mx-auto items-center uppercase justify-center font-bold text-2xl">
        Quero me Cadastrar
    </a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <x-input model="user.name" :name="'name'" label="Nome" :placeholder="'Nome *'" type="text" autocomplete="name"/>
    <x-input model="user.email" :name="'email'" label="E-mail" :placeholder="'E-mail *'" type="email" autocomplete="email"/>
    <x-input model="password" :name="'password'" label="Senha" :placeholder="'Senha *'" type="new-password" autocomplete="new-password"/>
    <x-input model="confirmPassword" :name="'confirmPassword'" label="Confirme sua Senha" :placeholder="'Confirme sua Senha *'" type="new-password" autocomplete="new-password"/>
    <x-input model="user.identification" :name="'identification'" label="CPF ou CNPJ *" :placeholder="'123.XXX.XXX-XX ou 61.XXX.XXX/XXXX-XX'" type="text" autocomplete="off"/>
    <x-input model="user.cep" :name="'cep'" label="CEP" :placeholder="'Ex: 00000-000'" type="text" autocomplete="off"/>

    <button wire:click="submit" class="border border-orange-500 rounded shadow h-12 my-5 uppercase font-bold hover:text-orange-600 text-orange-500">
        <div class="flex items-center justify-center">
            <x-icon.heroicons.outline.user-add class="w-6 h-6 mx-1"/>
            Cadastrar
        </div>
    </button>
</form>