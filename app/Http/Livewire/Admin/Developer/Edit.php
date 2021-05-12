<?php

namespace App\Http\Livewire\Admin\Developer;

use App\Models\Group;
use Livewire\Component;
use App\Models\Developer;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $photo;
    public $group_id;
    public $password;
    public $developer;

    protected $rules = [];

    protected $listeners = ['destroy' => 'destroy'];

    public function mount(Developer $developer)
    {
        $this->developer = $developer;

        $this->group_id = $developer->group_id;

        $this->rules = $this->rules();
    }

    public function update()
    {
        
        $this->validate();
        
        $this->developer->update();
        
        $this->password && $this->developer->update(['password' => bcrypt($this->password)]);

        $this->photo && $this->developer->update(['photo' => $this->photo->storeAs('', $this->developer->username.".png", 'photos')]);

        if($this->group_id != $this->developer->group_id)
        {
            $this->developer->update(['group_id' => $this->group_id]);

            if($this->developer->isGroupAdmin())
            {
                Group::where('admin_id', $this->developer->id)->update(['admin_id' => Null]);
            }
        }
        
        session()->flash('sweet-success-modal', 'Developer account updated successfully');

        return redirect()->to('admin/developers');

    }

    public function destroy($id)
    {

        $developer = Developer::findOrFail($id);

        if($developer->themes->count() > 0)
        {
            return $this->dispatchBrowserEvent('sweet-error-modal', ['message' => 'Remove the underline themes']);
        }

        if($developer->isGroupAdmin())
        {
            return $this->dispatchBrowserEvent('sweet-error-modal', ['message' => 'You can not remove group admin']);
        }

        Storage::disk('photos')->delete($developer->photo);
        
        Developer::destroy($id);

        session()->flash('sweet-success-modal', 'Developer account deleted successfully');

        return redirect()->to('admin/developers');
    }

    public function rules()
    {
        return [
            'developer.title' => 'required',
            'developer.level' => 'required',
            'developer.gender' => 'required',
            'developer.name' => 'required|min:3',
            'developer.address' => 'required|min:3',
            'password' => 'nullable|min:4',
            'photo' => 'nullable|image|max:1024',
            'group_id' => 'required|exists:groups,id',
            'developer.email' => 'nullable|email|unique:users,email,'.$this->developer->id,
            'developer.username' => 'required|min:3|unique:users,username,'.$this->developer->id,
            'developer.phone_number' => 'nullable|unique:users,phone_number,'.$this->developer->id,
            'developer.whatsapp_number' => 'nullable|unique:users,whatsapp_number,'.$this->developer->id,
        ];
    }

    public function render()
    {
        return view('livewire.admin.developer.edit', [
            'groups' => Group::all()
        ]);
    }
}
