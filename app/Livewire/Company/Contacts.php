<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Contacts extends Component
{   
    
    public function render()
    {
        return view('livewire.company.contracts.contracts')->layout("layouts.company-layout",["title"=>"العقود"]);;
    }
}
