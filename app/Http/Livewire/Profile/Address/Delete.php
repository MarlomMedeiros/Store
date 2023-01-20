<?php

namespace App\Http\Livewire\Profile\Address;

use App\Http\Livewire\Toast;
use App\Models\Address;
use Livewire\Component;

class Delete extends Component
{
    public Address $address;

    public function delete(): void
    {
        $this->address->delete();

        $this->emitTo(Index::class, 'address::delete');

        $this->emitTo(
            Toast::class,
            'showToast',
            ['message' => 'Endereço deletado com sucesso!', 'title' => 'Sucesso!']
        );
    }

    public function render()
    {
        return view('livewire.profile.address.delete');
    }
}
