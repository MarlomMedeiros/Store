<?php

namespace App\Http\Livewire\Profile\Address;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public const INDEX       = 1;
    public const EDIT_MODE   = 2;
    public const CREATE_MODE = 3;

    public $editMode = self::INDEX;

    public Collection $addresses;

    public User $user;

    protected $listeners = [
        'address::cancelEditMode' => 'cancelEditMode',
        'address::create'         => 'loadAddresses',
        'address::delete'         => 'loadAddresses'
    ];

    public function mount(): void
    {
        $this->loadAddresses();
    }

    public function cancelEditMode(): void
    {
        $this->editMode = self::INDEX;
    }

    public function editMode(Address $address): void
    {
        $this->emitTo(Edit::class, 'address::edit-mode', $address);

        $this->editMode = self::EDIT_MODE;
    }

    public function loadAddresses(): void
    {
        $this->addresses = Address::query()
            ->where('user_id', '=', $this->user->id)
            ->orderBy('default', 'DESC')
            ->get();
    }

    public function mainAddress(Address $address): void
    {

        DB::transaction(function () use ($address) {
            Address::query()
                ->Where('user_id', '=', $address->user_id)
                ?->update(['default' => false]);

            Address::query()
                ->firstWhere('id', '=', $address->id)
                ->update(['default' => true]);
        });

        $this->loadAddresses();
    }

    public function render()
    {
        return view('livewire.profile.address.index');
    }
}
