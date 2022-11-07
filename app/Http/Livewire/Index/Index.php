<?php

namespace App\Http\Livewire\Index;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $products = Product::All();

        return view('livewire.index.index', compact('products'));
    }
}
