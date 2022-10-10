<div x-cloak wire:ignore.self wire:key="{{ uniqid() }}" x-transition x-data="{
    open: false,
    init() {
        setTimeout(() => {
           this.open = false;
        },  5000);
    }}"
     @toastshow.window="open = true; init()"
     x-show="open"
     class="absolute right-2 top-40 bg-white border-t-4 border-green-300 rounded-md text-teal-900 px-3 pr-24 py-4 shadow-md"
     role="alert">
    <div class="flex">

        <div class="pr-1">
            <x-icon.heroicons.outline.check-circle class="h-6 w-6" stroke="#85d16a"/>
        </div>
        <div>
            <p class="font-bold">{{ $title }}</p>
            <p class="text-sm">{{  $message }}</p>
        </div>
        <div x-on:click="open = false" class="cursor-pointer">
            <x-icon.heroicons.outline.x class="h-6 w-6 absolute top-0 right-2" fill="#9CA3B0"/>
        </div>
    </div>
</div>
