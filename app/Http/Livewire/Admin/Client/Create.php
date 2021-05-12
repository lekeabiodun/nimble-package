<?php

namespace App\Http\Livewire\Admin\Client;

use App\Models\Group;
use Livewire\Component;
use App\Models\Client;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $level;
    public $email;
    public $title;
    public $photo;
    public $gender;
    public $address;
    public $username;
    public $password;
    public $phone_number;
    public $whatsapp_number;

    protected $rules = [
        'title' => 'required',
        'gender' => 'required',
        'name' => 'required|min:3',
        'address' => 'required|min:3',
        'password' => 'required|min:4',
        'photo' => 'nullable|image|max:1024',
        'email' => 'nullable|email|unique:users,email',
        'username' => "required|min:3|not_regex:/ +/i|unique:users,username",
        'phone_number' => 'nullable|unique:users,phone_number',
        'whatsapp_number' => 'nullable|unique:users,whatsapp_number',
    ];

    public function store()
    {
        $this->validate();

        $photo = $this->photo ? $this->photo->storeAs('', $this->username.".png", 'photos') : '';

        Client::create([
            'photo' => $photo,
            'name' => $this->name,
            'email' => $this->email,
            'role' => 'client',
            'title' => $this->title,
            'gender' => $this->gender,
            'address' => $this->address,
            'group_id' => $this->group_id,
            'username' => $this->username,
            'password' => bcrypt($this->password),
            'phone_number' => $this->phone_number,
            'whatsapp_number' => $this->whatsapp_number,
        ]);
        
        session()->flash('sweet-success-modal', 'Client account created successfully');

        return redirect()->to('admin/clients');

    }

    public function render()
    {
        return view('livewire.admin.client.create');
    }
}
