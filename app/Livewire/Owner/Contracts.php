<?php

namespace App\Livewire\Owner;

use Livewire\Component;

class Contracts extends Component
{
    public function render()
    {
        return view('livewire.owner.contracts')->layout("layouts.owner-layout",["title"=>" العقود"]);
;
    }
}
