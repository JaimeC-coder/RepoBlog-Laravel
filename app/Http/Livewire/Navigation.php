<?php

namespace App\Http\Livewire;

use Livewire\Component;
Use App\Models\Category;

class Navigation extends Component
{
    public function render()
    {
        $category = Category::all();
        return view('livewire.navigation' ,compact('category'));
    }
}
