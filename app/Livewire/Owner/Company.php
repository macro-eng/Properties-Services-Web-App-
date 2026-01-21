<?php

namespace App\Livewire\Owner;

use Livewire\Component;

class Company extends Component
{
   
    public function render()
    {
        return view('livewire.owner.company') 
        ->layout("layouts.owner-layout",["title"=>"الشركات المتعاقد معها"]);

    }
}
