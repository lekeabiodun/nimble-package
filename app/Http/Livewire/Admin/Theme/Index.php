<?php

namespace App\Http\Livewire\Admin\Theme;

use App\Models\Theme;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $PerPage = 2;

    protected $listeners = ['destroy' => 'destroy'];

    public function paginationView()
    {
        return 'partials.pagination';
    }

    public function destroy($id)
    {
        $theme = Theme::find($id);

        Storage::disk('themes')->delete($theme->cover);

        Storage::disk('themes')->delete($theme->file);

        Theme::destroy($id);
        
        $this->dispatchBrowserEvent('sweet-success-modal', ['message' => 'Theme deleted sucessfully']);

    }

    public function render()
    {
        return view('livewire.admin.theme.index',[
            'themes' => Theme::with('developer')->when($this->search, function ($query, $search) {
                            $query->where('name', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%');
                        })->paginate($this->PerPage),
        ]);
    }
}
