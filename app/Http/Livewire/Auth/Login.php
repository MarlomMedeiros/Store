<?php

namespace App\Http\Livewire\Auth;

use App\Http\Livewire\Toast;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public string $login = '';

    public string $password = '';

    public User $user;

    public function rules(): array
    {
        return [
            'login'    => 'required|string|min:4|max:255',
            'password' => 'required|string|min:4|max:80',

        ];
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function mount(): void
    {
        $this->user = new User();
    }

    public function submit(): void
    {
        $this->validate();

        if (User::Where('email', $this->login)->orWhere('identification', $this->login)->first()) {
            $this->user = User::Where('email', $this->login)->orWhere('identification', $this->login)->first();
        } else {
            $this->emitTo(Toast::class, 'showToast', ['message' => 'Usuário não encontrado', 'title' => 'Erro']);

            return;
        }

        if (Hash::check($this->password, $this->user->password)) {
            Auth::login($this->user, true);

            $this->emitTo(Toast::class, 'showToast', ['message' => 'Login efetuado com sucesso', 'title' => 'Sucesso']);

            $this->resetErrorBag();

            $this->resetValidation();

            $this->dispatchBrowserEvent('redirect', ['url' => route('home')]);
        } else {
            $this->emitTo(Toast::class, 'showToast', ['message' => 'Senha incorreta', 'title' => 'Erro']);
        }
    }
}
