<div>
    <form class="flex flex-col px-8" wire:submit.prevent="submit">
        <a class="text-orange-500 my-4 flex mx-auto items-center uppercase justify-center font-bold text-2xl">
            Já Tenho Conta
        </a>

        <x-input :name="'email2'" label="E-mail, CPF ou CNPJ *" :model="'login'" :placeholder="'E-mail, CPF ou CNPJ *'" type="text" autocomplete="email"/>
        <x-input :name="'password2'" label="Senha" :model="'password'" :placeholder="'Senha *'" type="password" autocomplete="current-password"/>

        <button class="border border-orange-500 rounded shadow h-12 my-5 uppercase font-bold hover:text-orange-600 text-orange-500" type="submit">
            <div class="flex items-center justify-center">
                <x-icon.heroicons.outline.user class="w-6 h-6 mx-1"/>
                Entrar
            </div>
        </button>
        <div class="h-auto w-96">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <a class="grid grid-cols-1 divide-y">
            <div class="flex items-center pb-8 text-xs justify-center uppercase font-semibold">
                <span class="text-orange-500 mx-3 cursor-pointer">Esqueci meu login</span>
                <span class="text-orange-500 mx-3 cursor-pointer">Esqueci minha senha</span>
            </div>
            <div>
                <div class="border border-blue-800 text-blue-700 cursor-pointer font-bold text-md justify-center flex items-center rounded shadow h-12 my-5 uppercase font-bold hover:text-blue-800" type="submit">
                    Entrar com o Facebook
                </div>

                <div class="border border-orange-500 text-orange-500 cursor-pointer font-bold text-md justify-center flex items-center rounded shadow h-12 my-5 uppercase font-bold hover:text-orange-600" type="submit">
                    Entrar com o Google
                </div>
            </div>
        </a>
    </form>
</div>
