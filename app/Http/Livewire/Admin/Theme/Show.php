<?php

namespace App\Http\Livewire\Admin\Theme;

use App\Models\Theme;
use Livewire\Component;

class Show extends Component
{
    public $theme;

    public function mount(Theme $theme)
    {
        $this->theme = $theme;
    }
    
    public function render()
    {
        return view('livewire.admin.theme.show');
    }
}
