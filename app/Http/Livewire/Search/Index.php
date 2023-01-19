<?php

namespace App\Http\Livewire\Search;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public ?string $result;
    public string $orderyBy     = 'asc';
    public int $showCount       = 20;
    public string $columOrderBy = 'name';
    public int $type            = 0;

    public function mount(string $result): void
    {
        $this->result = $result;
    }

    public function orderList($type): void
    {
        switch ($type) {
            case 1:
                $this->columOrderBy = 'name';
                $this->orderyBy     = 'asc';

                break;
            case 2:
                $this->columOrderBy = 'price';
                $this->orderyBy     = 'asc';

                break;
            case 3:
                $this->columOrderBy = 'price';
                $this->orderyBy     = 'desc';

                break;
            case 4:
                $this->columOrderBy = 'created_at';
                $this->orderyBy     = 'asc';

                break;
        }
    }

    public function render()
    {
        $this->orderList($this->type);

        return view('livewire.search.index', [
            'products' => Product::where('name', 'like', '%' . $this->result . '%')
                ->orderBy($this->columOrderBy, $this->orderyBy)
                ->paginate($this->showCount)
        ]);
    }
}
