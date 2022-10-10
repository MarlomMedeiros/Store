<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public Product $product;
    
    public function render()
    {
        return view('livewire.product.index');
    }
}
