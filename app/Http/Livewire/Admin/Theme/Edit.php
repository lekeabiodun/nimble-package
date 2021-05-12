<?php

namespace App\Http\Livewire\Admin\Theme;

use App\Models\Theme;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;
    
    public $theme;
    public $cover;
    public $file;
    
    protected $rules = [
        
        'theme.name' => 'required',
        'theme.description' => 'required',
        'cover'=> 'nullable|image|max:1024',
        'file'=> 'nullable|file|mimes:zip|max:10240',
    ];
    
    protected $validationAttributes = [
        'theme.name' => 'theme name',
        'theme.description' => 'theme description',
        'cover' => 'theme cover',
        'file' => 'theme zip file',
    ];
    
    protected $listeners = ['destroy' => 'destroy'];

    public function mount(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function update()
    {
        $this->validate();

        $slug = $this->generateSlug();
        
        $this->theme->update(['slug' => $slug]);

        if(!empty($this->cover))
        {
            Storage::disk('themes')->delete($this->theme->cover);
            $cover = $this->cover->storeAs('', $slug.".png", 'themes');
            $this->theme->update(['cover' => $cover]);
        }
        
        if(!empty($this->file))
        {
            Storage::disk('themes')->delete($this->theme->file);
            $file = $this->file->storeAs('', $slug.".zip", 'themes');
            $this->theme->update(['file' => $file]);
        }

        session()->flash('sweet-success-modal', 'Theme updated successfully');

        return redirect()->to('admin/themes');
    }

    public function generateSlug()
    {
        $slug = Str::slug($this->theme->name);
        while(Theme::where('slug', $slug)->count()) {
            $slug = Str::slug($this->theme->name).'_'.rand(1000, 3000);
        }
        return $slug;
    }

    public function destroy($id)
    {
        $theme = Theme::find($id);

        Storage::disk('themes')->delete($theme->cover);

        Storage::disk('themes')->delete($theme->file);

        Theme::destroy($id);
        
        session()->flash('sweet-success-modal', 'Theme deleted successfully');

        return redirect()->to('admin/themes');

    }


    public function render()
    {
        return view('livewire.admin.theme.edit');
    }

}
