<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;

class Menu extends Component
{
    public $categories;
    public $subcategories;
    public $products;

    public function mount()
    {
        $this->reset('categories', 'subcategories', 'products');
        $this->categories = Category::all()->unique('name');
    }

    public function loadSubcategories($subCategoryId)
    {
        $this->reset('subcategories', 'products');
        $this->subcategories = SubCategory::where('category_id', $subCategoryId)->get();
    }

    public function loadProducts($subCategoryId)
    {
        $this->products = Product::where('sub_category_id', $subCategoryId)->get();
    }

    public function render()
    {
        return view('livewire.menu');
    }
}
