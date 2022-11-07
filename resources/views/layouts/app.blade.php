<!DOCTYPE html>
<html class="bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body>
    <div>
        <div class="bg-[#0060b1] w-auto h-24">
            <div class="flex p-6 justify-center">
                <a href="{{ route('home') }}" class="text-4xl font-bold text-white cursor-pointer">LOGO</a>
                <livewire:search />
                @if(!request()->routeIs('login'))
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="flex-col flex justify-center">
                            <a class="invisible lg:visible text-sm font-bold text-gray-200 lg:ml-20">
                                Olá, {{ \Illuminate\Support\Facades\Auth::user()->name }}
                            </a>
                            <div class="flex grid md:grid-cols-2 md:divide-x">
                                <a class="font-normal text-sm text-white cursor-pointer hover:underline lg:ml-20 lg:pr-1">Minha Conta</a>
                                <a href="{{ route('logout') }}" class="font-normal text-sm text-white cursor-pointer hover:underline lg:pl-1">Deslogar</a>
                            </div>
                        </div>
                    @else
                        <div class="invisible lg:visible invisible font-bold text-gray-200 lg:ml-20">
                            Faça
                            <a href="{{ route('login') }}" class="text-white cursor-pointer hover:underline">Login</a> ou
                            <br>
                            crie seu <a href="{{ route('login') }}" class="text-white cursor-pointer hover:underline">Cadastro</a>
                        </div>
                    @endif
                @endif
                <div class="cursor-pointer relative flex items-baseline lg:items-center pt-1 text-white ml-1 lg:ml-16">
                    <a href="{{ route('cart') }}">
                        <x-icon.heroicons.solid.shopping-cart class="lg:h-8 lg:w-8 w-10 h-10"/>
                        <livewire:cart.show/>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-auto flex justify-center bg-orange-500 h-10">
            <div class="grid grid-cols-6 divide-x divide-gray-100/40 uppercase text-xs  md:text-[0.875rem] bg-orange-500 h-10 font-bold text-white">
                <a class="h-full flex justify-center items-center gar align-middle cursor-pointer hover:bg-orange-600 text-center p-0.5 px-8">
                    Novidades
                </a>
                <a class="h-full flex justify-center items-center gar align-middle cursor-pointer hover:bg-orange-600 text-center p-0.5">
                    Destaques
                </a>
                <a class="h-full flex justify-center items-center gar align-middle cursor-pointer hover:bg-orange-600 text-center p-0.5">
                    Ofertas
                </a>
                <a class="h-full flex justify-center items-center gar align-middle cursor-pointer hover:bg-orange-600 text-center p-0.5">
                    PC Gamer
                </a>
                <a class="h-full flex justify-center items-center gar align-middle cursor-pointer hover:bg-orange-600 text-center p-0.5">
                    Eletrônicos
                </a>
                <a class="h-full flex justify-center items-center gar align-middle cursor-pointer hover:bg-orange-600 text-center p-0.5">
                    Baixe o APP
                </a>
            </div>
        </div>
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>


    <livewire:toast/>
    @livewireScripts
</body>

<footer>
    <div class="w-auto h-16 flex justify-center font-semibold text-white items-center bg-[#0060b1]">
        © 2003–2022 Copyright Marlom Medeiros, Inc. All rights reserved.
    </div>
</footer>

</html>
