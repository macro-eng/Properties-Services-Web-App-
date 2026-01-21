<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.company.dashboard') 
        ->layout("layouts.company-layout",["title"=>"لوحة التحكم"]);

    }
}
