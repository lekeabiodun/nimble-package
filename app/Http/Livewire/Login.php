<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;
    public $remember_me;

    protected $rules = [
        "username" => "required",
        "password" => "required",
    ];

    public function login()
    {
        $this->validate();

        if(auth()->attempt($this->validate(), $this->remember_me))
        {
            return redirect()->to(user()->role);
        };

        $this->dispatchBrowserEvent('sweet-error-modal', ['message' => 'Invalid credentials']);

    }

    public function render()
    {
        return view('livewire.login');
    }
}
