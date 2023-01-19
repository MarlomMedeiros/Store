<?php

namespace App\Http\Livewire\Profile\UserData;

use App\Http\Livewire\Toast;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    public ?User $user;

    public bool $modal = false;

    public function rules(): array
    {
        return [
            'user.name'           => 'required|',
            'user.email'          => 'required|string|min:5|max:255',
            'user.identification' => 'required|string|min:11|max:20',
            'user.birthday'       => 'nullable|date',
            'user.cellphone'      => 'nullable',
            'user.send_offers'    => 'nullable',
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'user.name'           => 'Nome',
            'user.email'          => 'E-mail',
            'user.identification' => 'CPF/CNPJ',
            'user.birthday'       => 'Data de Nascimento',
            'user.cellphone'      => 'Telefone Celular',
            'user.send_offers'    => 'ofertas e novidades',
        ];
    }

    public function mount(): void
    {
        $this->user = Auth::user();
    }

    public function save()
    {
        $this->validate();

        if (empty($this->user->birthday)) {
            $this->user->birthday = null;
        }

        if (strlen($this->user->birthday) > 10) {
            session()->flash('message', 'Data inválida.');

            return;
        }

        if (empty($this->user->cellphone)) {
            $this->user->cellphone = null;
        } else {
            $this->user->cellphone = preg_replace('/[^0-9]/', '', $this->user->cellphone);

            if (strlen($this->user->cellphone) < 10) {
                session()->flash('message', 'Número de Telefone Celular Inválido.');

                return;
            }
        }

        $this->user->save();

        $this->emitTo(Toast::class, 'showToast', ['message' => 'Dados salvos com sucesso!', 'title' => 'Sucesso']);
    }

    public function render()
    {
        return view('livewire.profile.user-data.edit');
    }
}
