<?php

namespace App\Livewire\Owner;

use Livewire\Component;

class Services extends Component
{
     public function bookings()
    {
        return view('livewire.owner.bookings')
        ->layout("layouts.owner-layout",["title"=>"الشركات المتعاقد معها"]);
    }   
     public function payments()
    {
        return view('livewire.owner.payment')
        ->layout("layouts.owner-layout",["title"=>"الشركات المتعاقد معها"]);
    }  
    public function render()
    {
        return view('livewire.owner.services')
        ->layout("layouts.owner-layout",["title"=>"الخدمات"]);

    }
}
