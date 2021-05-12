<?php

namespace App\Http\Livewire\Admin\Group;

use App\Models\Group;
use Livewire\Component;
use App\Models\Developer;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name;
    public $admin_id;
    public $description;

    protected $rules = [
        'name' => 'required',
        'description' => 'nullable',
        'admin_id' => 'nullable|exists:users,id',
    ];

    protected $validationAttributes = [
        'name' => 'group name',
        'description' => 'group description',
        'admin_id' => 'group admin',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function store()
    {
        $this->validate();

        $slug = $this->generateSlug();

        $group = Group::create([
            'name' => $this->name,
            'description' => $this->description,
            'admin_id' => $this->admin_id,
            'slug' => $slug,
        ]);

       $this->admin_id &&  Developer::find($this->admin_id)->update(['group_id' => $group->id]);
        
        session()->flash('sweet-success-modal', 'Group created sucessfully');

        return redirect()->to('admin/groups');

    }

    public function generateSlug()
    {
        $slug = Str::slug($this->name);
        while(Group::where('slug', $slug)->count()) {
            $slug = Str::slug($this->name).'_'.rand(1000, 3000);
        }
        return $slug;
    }

    public function render()
    {
        return view('livewire.admin.group.create', [
            'developers' => Developer::all(),
        ]);
    }
}
