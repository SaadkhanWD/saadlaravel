<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CatalogueComponent extends Component
{
    public function render()
    {
        $categories = category::all();
        return view('livewire.catalogue-component',['categories'=> $categories])->layout('Layouts.base');
    }
}
