<?php

namespace App\Http\Livewire\Cart;

use Cookie;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['cart::cartUpdated' => 'mount'];

    public int $cartCount = 0;

    public function mount()
    {
        $this->fillCart();
    }

    public function fillCart()
    {
        $this->cartCount = collect(json_decode(Cookie::get('cart')))->count();
    }

    public function render()
    {
        return view('livewire.cart.show');
    }
}
