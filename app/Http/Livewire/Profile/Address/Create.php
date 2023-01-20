<?php

namespace App\Http\Livewire\Profile\Address;

use App\Http\Livewire\Toast;
use App\Models\Address;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Address $address;

    public User $user;

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

    public function mount(): void
    {
        $this->address = new Address();
    }

    public function cancel(): void
    {
        $this->emitUp('address::cancelEditMode');
    }

    public function create(): void
    {
        $this->validate();

        if ($this->address->default) {
            $this->user->addresses->where('default', '=', '1')
                ?->first()?->update(['default' => false]);
        } else {
            $this->address->default = false;
        }

        $this->address->user_id = $this->user->id;

        $this->address->save();

        $this->emitUp('address::cancelEditMode');
        $this->emitUp('address::create');

        $this->emitTo(
            Toast::class,
            'showToast',
            ['message' => 'Endereço adicionado com sucesso', 'title' => 'Sucesso!']
        );
    }

    public function render()
    {
        return view('livewire.profile.address.create');
    }
}
