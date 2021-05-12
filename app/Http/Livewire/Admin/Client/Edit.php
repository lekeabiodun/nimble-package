<?php

namespace App\Http\Livewire\Admin\Client;

use App\Models\Group;
use Livewire\Component;
use App\Models\Client;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $photo;
    public $group_id;
    public $password;
    public $Client;

    protected $rules = [];

    protected $listeners = ['destroy' => 'destroy'];

    public function mount(Client $Client)
    {
        $this->Client = $Client;

        $this->group_id = $Client->group_id;

        $this->rules = $this->rules();
    }

    public function update()
    {
        
        $this->validate();
        
        $this->Client->update();
        
        $this->password && $this->Client->update(['password' => bcrypt($this->password)]);

        $this->photo && $this->Client->update(['photo' => $this->photo->storeAs('', $this->Client->username.".png", 'photos')]);

        if($this->group_id != $this->Client->group_id)
        {
            $this->Client->update(['group_id' => $this->group_id]);

            if($this->Client->isGroupAdmin())
            {
                Group::where('admin_id', $this->Client->id)->update(['admin_id' => Null]);
            }
        }
        
        session()->flash('sweet-success-modal', 'Client account updated successfully');

        return redirect()->to('admin/Clients');

    }

    public function destroy($id)
    {

        $Client = Client::findOrFail($id);

        if($Client->themes->count() > 0)
        {
            return $this->dispatchBrowserEvent('sweet-error-modal', ['message' => 'Remove the underline themes']);
        }

        if($Client->isGroupAdmin())
        {
            return $this->dispatchBrowserEvent('sweet-error-modal', ['message' => 'You can not remove group admin']);
        }

        Storage::disk('photos')->delete($Client->photo);
        
        Client::destroy($id);

        session()->flash('sweet-success-modal', 'Client account deleted successfully');

        return redirect()->to('admin/Clients');
    }

    public function rules()
    {
        return [
            'Client.title' => 'required',
            'Client.level' => 'required',
            'Client.gender' => 'required',
            'Client.name' => 'required|min:3',
            'Client.address' => 'required|min:3',
            'password' => 'nullable|min:4',
            'photo' => 'nullable|image|max:1024',
            'group_id' => 'required|exists:groups,id',
            'Client.email' => 'nullable|email|unique:users,email,'.$this->Client->id,
            'Client.username' => 'required|min:3|unique:users,username,'.$this->Client->id,
            'Client.phone_number' => 'nullable|unique:users,phone_number,'.$this->Client->id,
            'Client.whatsapp_number' => 'nullable|unique:users,whatsapp_number,'.$this->Client->id,
        ];
    }

    public function render()
    {
        return view('livewire.admin.Client.edit', [
            'groups' => Group::all()
        ]);
    }
}
