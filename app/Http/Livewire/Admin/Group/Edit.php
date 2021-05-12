<?php

namespace App\Http\Livewire\Admin\Group;

use App\Models\Group;
use Livewire\Component;
use App\Models\Developer;
use Illuminate\Support\Str;

class Edit extends Component
{

    public $group;

    protected $rules = [
        'group.name' => 'required',
        'group.description' => 'nullable',
        'group.admin_id' => 'nullable|exists:users,id',
    ];

    protected $validationAttributes = [
        'group.name' => 'group name',
        'group.description' => 'group description',
        'group.admin_id' => 'group admin',
    ];

    protected $listeners = ['destroy' => 'destroy'];

    public function mount(Group $group)
    {
        $this->group = $group;
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function update()
    {
        $this->validate();

        $slug = $this->generateSlug();

        $this->group->update([
            'name' => $this->group->name,
            'description' => $this->group->description,
            'admin_id' => $this->group->admin_id,
            'slug' => $slug,
        ]);

        Developer::find($this->group->admin_id)->update(['group_id' => $this->group->id]);
        
        session()->flash('sweet-success-modal', 'Group updated sucessfully');

        return redirect()->to('admin/groups');

    }

    public function generateSlug()
    {
        $slug = Str::slug($this->group->name);
        while(Group::where('id', '!=', $this->group->id)->where('slug', $slug)->count()) {
            $slug = Str::slug($this->group->name).'_'.rand(1000, 3000);
        }
        return $slug;
    }

    public function destroy($id)
    {
        Group::destroy($id);
        
        Developer::where('group_id', $id)->update(['group_id' => Null]);
        
        session()->flash('sweet-success-modal', 'Group deleted sucessfully');

        return redirect()->to('admin/groups');

    }

    public function render()
    {
        return view('livewire.admin.group.edit', [
            'developers' => Developer::all()
        ]);
    }
}
