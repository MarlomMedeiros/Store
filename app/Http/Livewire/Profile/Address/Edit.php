<?php

namespace App\Http\Livewire\Profile\Address;

use App\Http\Livewire\Toast;
use App\Models\Address;
use Livewire\Component;

class Edit extends Component
{
    public Address $address;

    protected $listeners = [
        'address::edit-mode' => 'fillAddress'
    ];

    public function rules(): array
    {
        return [
            'address.name'         => 'required',
            'address.street'       => 'required',
            'address.state'        => 'required',
            'address.city'         => 'required',
            'address.post_code'    => 'required',
            'address.full_address' => 'required',
            'address.default'      => 'nullable',
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'address.name'         => 'nome',
            'address.street'       => 'rua',
            'address.state'        => 'estado',
            'address.city'         => 'cidade',
            'address.post_code'    => 'cep',
            'address.full_address' => 'endereço completo',
            'address.default'      => 'endereço como padrão',
        ];
    }

    public function fillAddress(Address $address)
    {
        $this->address = $address;
    }

    public function cancel(): void
    {
        $this->emitUp('address::cancelEditMode');
    }

    public function edit(): void
    {
        $this->validate();

        if ($this->address->default) {
            Address::where('user_id', '=', $this->address->user_id)
                ?->first()?->update(['default' => false]);
        } else {
            $this->address->default = false;
        }

        $this->address->save();

        $this->emitUp('address::cancelEditMode');
        $this->emitUp('address::edit');

        $this->emitTo(
            Toast::class,
            'showToast',
            ['message' => 'Endereço editado com sucesso', 'title' => 'Sucesso!']
        );
    }

    public function render()
    {
        return view('livewire.profile.address.edit');
    }
}
