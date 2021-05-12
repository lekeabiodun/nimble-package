<?php

namespace App\Http\Livewire\Admin\Group;

use App\Models\Group;
use Livewire\Component;
use App\Models\Developer;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $PerPage= 5;

    protected $listeners = ['destroy' => 'destroy'];

    public function paginationView()
    {
        return 'partials.pagination';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroy($id)
    {
        Group::destroy($id);
        
        Developer::where('group_id', $id)->update(['group_id' => Null]);

        $this->dispatchBrowserEvent('sweet-success-modal', ['message' => 'Group deleted sucessfully']);

    }

    public function render()
    {
        return view('livewire.admin.group.index', [
            'groups' => Group::with('admin')
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%');
            })->paginate($this->PerPage),
        ]);
    }
}
