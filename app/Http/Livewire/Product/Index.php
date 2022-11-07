<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Cookie;
use Livewire\Component;

class Index extends Component
{
    public Product $product;

    public function render()
    {
        return view('livewire.product.index');
    }

    public function setCookie()
    {
        $cookie = collect(json_decode(Cookie::get('cart')));

        $result = $cookie->firstWhere('id', $this->product->id);
        
        if ($result) {
            $result->quantity += 1;
        } else {
            $cookie->push(['id' => $this->product->id, 'quantity' => 1]);
        }

        Cookie::queue('cart', $cookie, 60 * 24 * 30);

        $this->emit('cart::cartUpdated');
    }
}
