<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Payment extends Component
{
    public function render()
    {
        return view('livewire.company.payments')->layout("layouts.company-layout",["title"=>"المدفوعات"]);
    }
}
