<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public string $title   = 'Sucesso';
    public string $message = 'Operação realizada com sucesso';
    protected $listeners   = ['showToast'];

    public function render()
    {
        return view(
            'livewire.toast',
            [
                'message' => $this->message,
                'title'   => $this->title,
            ]
        );
    }

    public function showToast(array $params): void
    {
        $this->message = $params['message'];
        $this->title   = $params['title'];

        $this->dispatchBrowserEvent('toastshow');
    }
}
