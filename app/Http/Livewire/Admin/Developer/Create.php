<?php

namespace App\Http\Livewire\Admin\Developer;

use App\Models\Group;
use Livewire\Component;
use App\Models\Developer;
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
    public $group_id;
    public $password;
    public $phone_number;
    public $whatsapp_number;

    protected $rules = [
        'title' => 'required',
        'level' => 'required',
        'gender' => 'required',
        'name' => 'required|min:3',
        'address' => 'required|min:3',
        'password' => 'required|min:4',
        'photo' => 'nullable|image|max:1024',
        'group_id' => 'required|exists:groups,id',
        'email' => 'nullable|email|unique:users,email',
        'username' => "required|min:3|not_regex:/ +/i|unique:users,username",
        'phone_number' => 'nullable|unique:users,phone_number',
        'whatsapp_number' => 'nullable|unique:users,whatsapp_number',
    ];

    public function store()
    {
        $this->validate();

        $photo = $this->photo ? $this->photo->storeAs('', $this->username.".png", 'photos') : '';

        Developer::create([
            'photo' => $photo,
            'name' => $this->name,
            'email' => $this->email,
            'role' => 'developer',
            'level' => $this->level,
            'title' => $this->title,
            'gender' => $this->gender,
            'address' => $this->address,
            'group_id' => $this->group_id,
            'username' => $this->username,
            'password' => bcrypt($this->password),
            'phone_number' => $this->phone_number,
            'whatsapp_number' => $this->whatsapp_number,
        ]);
        
        session()->flash('sweet-success-modal', 'Developer account created successfully');

        return redirect()->to('admin/developers');

    }

    public function render()
    {
        return view('livewire.admin.developer.create', [
            'groups' => Group::all(),
        ]);
    }
}
