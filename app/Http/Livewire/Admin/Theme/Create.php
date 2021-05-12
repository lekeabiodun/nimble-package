<?php

namespace App\Http\Livewire\Admin\Theme;

use App\Models\Theme;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $cover;
    public $file;
    public $description;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'cover'=> 'required|image|max:1024',
        'file'=> 'required|file|mimes:zip|max:10240',
    ];

    protected $validationAttributes = [
        'name' => 'theme name',
        'description' => 'theme description',
        'cover' => 'theme cover',
        'file' => 'theme zip file',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function store()
    {
        $this->validate();

        $slug = $this->generateSlug();
        $cover = $this->cover->storeAs('', $slug.".png", 'themes');
        $file = $this->file->storeAs('', $slug.".zip", 'themes');

        Theme::create([
            'name' => $this->name,
            'description' => $this->description,
            'cover' => $cover,
            'file' => $file,
            'slug' => $slug,
            'status' => 1,
            'user_id' => user()->id,
        ]);

        session()->flash('sweet-success-modal', 'Theme added successfully');

        return redirect()->to('admin/themes');

    }

    public function generateSlug()
    {
        $slug = Str::slug($this->name);
        while(Theme::where('slug', $slug)->count()) {
            $slug = Str::slug($this->name).'_'.rand(1000, 3000);
        }
        return $slug;
    }

    public function render()
    {
        return view('livewire.admin.theme.create');
    }
}
