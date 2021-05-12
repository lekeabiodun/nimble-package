<?php

namespace App\Http\Livewire\Admin\Client;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $PerPage = 20;

    protected $listeners = ['destroy' => 'destroy'];

    // public function paginationView()
    // {
    //     return 'partials.pagination';
    // }

    public function updatingSearch()
    {
        $this->resetPage();
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


        $this->dispatchBrowserEvent('sweet-success-modal', ['message' => 'Client deleted sucessfully']);
    }

    public function render()
    {
        return view('livewire.admin.Client.index', [
            'clients' => Client::when($this->search, function ($query, $search) {
                $query->where('name', 'LIKE', '%'.$search.'%')->orWhere('title', 'LIKE', '%'.$search.'%')
                ->orWhere('username', 'LIKE', '%'.$search.'%')->orWhere('address', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%')->orWhere('phone_number', 'LIKE', '%'.$search.'%')
                ->orWhere('whatsapp_number', 'LIKE', '%'.$search.'%')->orWhere('gender', 'LIKE', '%'.$search.'%');
            })->paginate($this->PerPage),
        ]);
    }
}
