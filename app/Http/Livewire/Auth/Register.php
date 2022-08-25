<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public User $user;

    public string $password = '';

    public string $confirmPassword = '';

    public function rules(): array
    {
        return [
            'user.name'           => 'required|string|max:255',
            'user.email'          => 'required|string|max:255|unique:users,email,' . $this->user->email,
            'password'            => 'required|string',
            'confirmPassword'     => 'required|string|same:password',
            'user.identification' => 'required|string|min:11|unique:users,identification,' . $this->user->identification,
            'user.cep'            => 'required|string:min:8',
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'user.name'       => 'Nome',
            'user.email'      => 'E-mail',
            'password'        => 'Senha',
            'confirmPassword' => 'Confirmação da Senha',
            'identification'  => 'CPF/CNPJ',
            'user.cep'        => 'CEP',
        ];
    }

    public function mount(): void
    {
        $this->user = new User();
    }

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function submit(): void
    {
        $this->validate();

        $this->user->cep            = preg_replace('/[^0-9]/', '', $this->user->cep);
        $this->user->identification = preg_replace('/[^0-9]/', '', $this->user->identification);
        $this->user->password       = bcrypt($this->password);
        $this->user->save();

        session()->flash('message', 'Conta criada com sucesso.');

        $this->resetValidation();
    }
}
