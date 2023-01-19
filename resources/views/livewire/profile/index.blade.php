<div>
    <div class="lg:m-12 bg-gray-50 h-auto pb-12 lg:pr-16 rounded">
        <div class="font-bold text-xl pt-8 ml-8 mb-8 lg:pl-8 flex">
            <x-icon.heroicons.solid.user class="text-orange-600 w-7 h-7 mx-1"/>
            MEUS DADOS
        </div>
        <div class="flex gap-x-16 gap-y-5 grid grid-cols-2 rounded">
            <livewire:profile.user-data.edit/>
            <livewire:profile.address.index/>
        </div>
    </div>
</div>
