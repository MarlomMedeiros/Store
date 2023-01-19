<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use Cookie;
use Livewire\Component;

class Index extends Component
{
    public $cartItems;
    public $cartCookie;

    protected $listeners = ['refreshCartProducts' => 'checkCookie'];

    public function mount()
    {
        $this->checkCookie();
    }

    public function checkCookie()
    {
        $this->cartCookie = collect(json_decode(Cookie::get('cart')));
        $this->cartItems  = Product::query()->whereIn('id', $this->cartCookie->pluck('id'))->get();
    }

    public function clearCookie()
    {
        $this->checkCookie();
        Cookie::expire('cart');
        $this->emit('refreshCartProducts');
        $this->emit('cart::cartUpdated');
    }

    public function removeCartItem($productId)
    {
        $filtered = $this->cartCookie->reject(function ($value) use ($productId) {
            return (int)$value['id'] == (int)$productId;
        });

        Cookie::queue('cart', $filtered, 60 * 24 * 30);
        $this->checkCookie();
        $this->emit('refreshCartProducts');
        $this->emit('cart::cartUpdated');
    }

    public function setQuantity($productID, $amount)
    {
        $cookie = collect(json_decode(Cookie::get('cart')));

        $result = $cookie->firstWhere('id', $productID);

        if ($result) {
            if ($amount > 0) {
                $result->quantity += $amount;
            } else {
                if ($result->quantity <= 1) {
                    $this->removeCartItem($productID);

                    return;
                }
                $result->quantity += $amount;
            }
        }
        Cookie::queue('cart', $cookie, 60 * 24 * 30);

        $this->cartCookie = collect(json_decode($cookie));
        $this->cartItems  = Product::query()->whereIn('id', $this->cartCookie->pluck('id'))->get();
        $this->emit('refreshCartProducts');
    }

    public function getQuantity($productID): int
    {
        $cookie = collect(json_decode(Cookie::get('cart')));
        $result = $cookie->firstWhere('id', $productID);

        return $result ? $result->quantity : 0;
    }

    public function render()
    {
        return view('livewire.cart.index');
    }
}
