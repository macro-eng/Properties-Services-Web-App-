<?php

namespace App\Livewire\Property;
use App\Models\Property;
use App\Models\Photo;
use Livewire\Component;
function formatNumberShort($number):string{
        if($number >= 1_000_000_000){
            return round($number /1_000_000_000,1 ).'B';

        }elseif($number >=1_000_000){
        return round($number /1_000_000,1 ).'مليون';
        }elseif($number >=1_000){
        return round($number /1_000,1 ).'الف';      
        }
        return number_format($number);
    }
class PropertyDetails extends Component
{    
    public $price ;
    public function render(string $id)
    {   $property = Property::find($id);
        $photos = Photo::where("property_id", $id)->get();
        $this->price = $property->price;
        $m = formatNumberShort($this->price);
        return view('livewire.property.property-details',compact("property","photos","m"))
        ->layout("layouts.app",["title"=>"Property Details"]);
    }
}
