<?php

namespace App\Livewire\Owner;

use Livewire\Component;
use App\Models\Property;
class Dashboard extends Component
{
    public function profile()
    {
        return view('livewire.owner.profile') 
        ->layout("layouts.owner-layout",["title"=>"الملف الشخصي"]);

    }
    public function render()
    {   
        $count = Property::all()->count();
        return view('livewire.owner.dashboard',compact("count")) 
        ->layout("layouts.owner-layout",["title"=>"لوحة التحكم"]);

    }
}
