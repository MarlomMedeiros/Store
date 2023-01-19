<?php

namespace App\Http\Livewire\Profile\UserData;

use App\Http\Livewire\Toast;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ModalPassword extends Component
{
    public bool $open = false;

    public User $user;

    public $password = '';

    public string $newPassword = '';

    public string $confirmPassword = '';

    protected $listeners = ['showModal'];

    public function rules(): array
    {
        return [
            'password'        => 'required|string|min:4|max:80',
            'newPassword'     => 'required|string|min:4|max:80',
            'confirmPassword' => 'required|string|min:4|same:newPassword',
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'password'        => 'Senha',
            'newPassword'     => 'Nova Senha',
            'confirmPassword' => 'Confirmação da Senha',
        ];
    }

    public function mount(): void
    {
        $this->user = Auth::user();
    }

    public function showModal(): void
    {
        $this->open = true;

        $this->resetValidation();

        $this->dispatchBrowserEvent('modalshow');
    }

    public function save(): void
    {
        $this->validate();

        if (!Hash::check($this->password, $this->user->password)) {
            session()->flash('message', 'Senha atual incorreta.');

            return;
        }

        $this->user->password = Hash::make($this->newPassword);

        $this->user->save();

        $this->open = false;

        $this->reset('password', 'newPassword', 'confirmPassword');

        $this->emitTo(Toast::class, 'showToast', ['message' => 'Dados salvos com sucesso!', 'title' => 'Sucesso']);
    }

    public function render()
    {
        return view('livewire.profile.user-data.modal-password');
    }
}
