<div class="flex transition-all items-center justify-center select-none absolute -right-1 top-1 @if($cartCount) visible h-4 w-4 @else invisible h-0 w-0 @endif rounded-full bg-orange-500">
    @if($cartCount)
        {{ $cartCount }}
    @endif
</div>