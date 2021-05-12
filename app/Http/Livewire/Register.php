<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $terms;
    
    protected $rules = [
        'name' => 'required|min:3',
        'username' => 'required|min:3|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4',
        'terms' => 'required|accepted',
    ];

    public function register()
    {
        $this->validate();

         Auth::login($user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => 'admin'
        ]));

        session()->flash('sweet-success-modal', 'Account created sucessfully');

        return redirect()->to($user->dashboard());

    }
    public function render()
    {
        return view('livewire.register');
    }
}
