<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [];

    public function render()
    {
        return view('livewire.search', [
            'results' => Product::where('name', 'like', '%' . $this->search . '%')->paginate(5)
        ]);
    }
}
