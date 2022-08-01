<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;
Use App\Models\User;
use App\Mail\InviteTextpayerMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\PasswordBroker;


class InviteUser extends Component
{
    public $email;
    public $name;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
    ];

    public function render()
    {
        return view('livewire.invite-user');
    }

    public function inviteTexpayer()
    {
        $this->validate();
        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'role' => 'TAXPAYER',
        ]);
        $this->broker()->sendResetLink(['email' => $user->email]);
        $this->emit('success','Invitation send successfully.');
        $this->emit('refreshPayerList');
        $this->reset();
    }

    protected function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }
}
