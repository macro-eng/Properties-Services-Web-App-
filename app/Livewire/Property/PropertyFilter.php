<?php

namespace App\Livewire\Property;
use App\Models\Property;
use App\Models\City;
use Livewire\Component;
use  Illuminate\Support\Facades\Auth;



class PropertyFilter extends Component
{  
    public $city;
    public $city1;
    public $selectedCity='';
    public $type;
    public $message;
    public $price;
    public $property;

   public function formatNumberShort($number){
        if($number >= 1_000_000_000){
            return round($number /1_000_000_000,1 ).'B';

        }elseif($number >=1_000_000){
        return round($number /1_000_000,1 ).'M';
        }elseif($number >=1_000){
        return round($number /1_000,1 ).'K';      
        }
        return number_format($number);
    }
 
    public function getPriceProperty(){
        return formatNumberShort($this->property->price);
    }
    public function mount(Property $property){
        $this->property = $property;
    }
    public function render()
    {   $message= 'no filtered';
        $cities = City::get();
        
        // $filters = $cities->find(1)->property->collect();
     if($this->type){
            $filters = property::where("type",$this->type)->get()->collect();
        }
     
       $properties =Property::all();
       if($this->city1){
           $properties = Property::with(['street.district.city'])->when($this->city1,
           function($query){
                $query->whereHas('street.district.city', function($q){
                    $q->where('id', $this->city1);
                });
            })->get();


            // $filters = $cities->find($this->city1)->property->collect();
        }
        

        return view('livewire.property.property-filter',compact(
            "cities",
            "properties"
        ))
        ->layout("layouts.app",["title"=>"List"]);
        
    }
}
