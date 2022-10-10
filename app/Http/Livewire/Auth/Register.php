<?php

namespace App\Http\Livewire\Auth;

use App\Http\Livewire\Toast;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public User $user;

    public string $password = '';

    public string $confirmPassword = '';

    public function rules(): array
    {
        return [
            'user.name'           => 'required|string|min:3|max:255',
            'user.email'          => 'required|string|min:5|max:255|unique:users,email,' . $this->user->email,
            'password'            => 'required|string|min:4|max:80',
            'confirmPassword'     => 'required|string|min:4|same:password',
            'user.identification' => 'required|string|min:11|max:20|unique:users,identification,' . $this->user->identification,
            'user.cep'            => 'required|string|min:8|max:9',

        ];
    }

    public function messages()
    {
        return [
            'confirmPassword.same' => 'As senhas não conferem',
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

        Auth::login($this->user, true);

        $this->emitTo(Toast::class, 'showToast', [
            'message' => 'Usuário cadastrado com sucesso',
            'title'   => 'Sucesso',
        ]);

        $this->user->name           = '';
        $this->user->email          = '';
        $this->user->cep            = '';
        $this->user->identification = '';
        $this->password             = '';
        $this->confirmPassword      = '';

        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatchBrowserEvent('redirect', ['url' => route('home')]);
    }
}
