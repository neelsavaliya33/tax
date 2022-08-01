<?php

namespace App\Http\Livewire;

use App\Models\User;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class TaxpayerList extends Component
{

    public $taxpayers, $status = [];
    protected $listeners = ['refreshPayerList' => 'refresh'];

    public function mount()
    {
        $this->taxpayers = User::taxpayer()->get();
    }

    public function updatedStatus($val){

    }

    public function render()
    {
        return view('livewire.taxpayer-list');
    }

    public function refresh()
    {
        $this->taxpayers = User::taxpayer()->get();
    }

    public function resendLink(User $user)
    {
        $this->broker()->sendResetLink(['email' => $user->email]);
        $this->emit('success', 'Mail sent successfully.');
    }

    protected function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }

    function updateUser(User $user)
    {
        $user->update(['status' => !$user->status]);
        $this->refresh();
        $this->emit('success', 'Status updated successfully.');
    }

    public function deleteUser(User $user){
        $user->delete();
        $this->refresh();
        $this->emit('success', 'User deleted.');
    }
}
