<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Requests extends Component
{
    public function render()
    {
        return view('livewire.company.requests')->layout("layouts.company-layout",["title"=>"الطلبات"]);

        ;
    }
}
