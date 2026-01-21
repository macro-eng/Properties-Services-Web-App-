<?php

namespace App\Livewire\Owner\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Collection;


use App\Models\City;
use App\Models\District;
use App\Models\Street;
use App\Models\Img;
use App\Models\apartmentsDetails;
use App\Models\roomDetails;
use App\Models\villaDetails;
use App\Models\Property as OwnerProperty;
use Livewire\WithFileUploads;

use Livewire\Component;

class Property extends Component
{   
    use WithFileUploads;
    public  $name;
    public $primary_path;
    public $messages;
    public $afloors;
    public $negotiable;
    public $area_2m;
    public $type;
    public $status;
    public $street_id;
    public $price;
    public $purpose;
    public $longitude;
    public $altitude;
    public $description;
    

    public $abathrooms;
    public $rooms;
    public $room;
    // public $hall;
    public $city;
    public $area;
    public $kitchen;

    // Imgs and other fields
    public $photos=[];
    public $villa;
    public $submitted;
    public $apartments;
   
    public $message;
    public $district;
    public $citychange;
    protected $listeners = ["updateCoordinates"];
    public $step=1;
    public function updateCoordinates($altitude, $longitude){
        $this->altitude = $altitude;
        $this->longitude = $longitude;
        
    }
    public function nextStep(){
        if($this->step<3){
            $this->step++;
        }
    }
    public function previousStep(){
        if($this->step > 1){
            $this->step--;
        }
    }
    // protected $rules =[
    //        'property.name'=>"required|string",
    //        'property.status'=>"required|string",
    //        'property.type'=>"required|string",
    //        'property.primary_path'=>"required|image",
    //        'property.negotiable'=>"required|boolean",
    //        'property.description'=>"required|string",
    //        'property.altitude'=>"required|float",
    //        'property.longitude'=>"required|float",
    //        'property.purpose'=>"required|string",
    //        'property.area_2m'=>"required|string",
    //        'property.price'=>"required|string",

          
    // ];
    public function formatNumberShort($number):string{
        if($number >= 1_000_000_000){
            return round($number /1_000_000_000,1 ).'B';

        }elseif($number >=1_000_000){
        return round($number /1_000_000,1 ).'M';
        }elseif($number >=1_000){
        return round($number /1_000,1 ).'K';      
        }
        return number_format($number);
    }
    public function save(){
        // $this->validate();
        // $this->save();
        $path = $this->primary_path->store('properties',"public");
        $property1 = OwnerProperty::create([
                "primary_path"=>$path,
                "name"=>$this->name,
                "type"=>$this->type,
                "negotiable"=>$this->negotiable,
                "street_id"=>$this->street_id,
                "user_id"=>Auth::id(),
                "price"=>$this->price,
                "purpose"=>$this->purpose,
                "description"=>$this->description,
                "altitude"=>$this->altitude,
                "longitude"=>$this->longitude,
                "status"=>$this->status,
                "street_id"=>$this->street_id,
                "is_verified"=>1,
            ]);
            // if($this->type === 'appartment'){
            //     if($propertyId->id > 0){
            //         $this->validate([
            //             'apartment.rooms'=>"required|string",
            //             'apartment.bathrooms'=>"required|string",
            //             'apartment.floors'=>"required|string",
            //             'apartment.hall'=>"required|string",
            //             'apartment.kitchen'=>"required|boolean",
            //         ]);
            //         $this->apartment->save();
              
            //     }
            // }
                // $this->validate([
                //     "photos.*"=>'image|max:1024'
                // ]);
           
            foreach($this->photos as $photo)
            {
                $path = $photo->store("followed_photos/{$property1->id}");
                $property1->photos()->create([
                    'path' => $path,
                ]);

                
            }
            session()->flash("success","تم الحفظ");
            return redirect("property/form");

        
    }

    public function dashboard(){
        return view('livewire.owner.dashboard')
        ->layout("layouts.owner-layout",["title"=>"Dashboard"]);
    }  
    public function propertylist(){
            return  view('livewire.owner.property.property-list')
            ->layout("layouts.owner-layout",["title"=>"Property List"]);
        }
     public function bookings(){
        return view('livewire.owner.bookings')
        ->layout("layouts.owner-layout",["title"=>"Bookings"]);
    }  
    public function profile(){
        return view('livewire.owner.profile')
        ->layout("layouts.owner-layout",["title"=>"Profile"]);
    }
    public function render()
      
    { 
        $this->submitted =false;
        if($this->altitude || $this->longitude){
            $this->messages =true;
        }
        $cities = City::get();
        
        $filters =District::get();
        $filterstreet=Street::get();
        if($this->city){
          
            $filters = District::where("city_id",$this->city)->get();
        }if($this->district){
            $filterstreet = Street::where("district_id",$this->district)->get();
            
        } if( $this->citychange !== $this->city){
            $this->citychange = $this->city;
         }
         
         if($this->type === 'apartments'){
           $this->apartments = true;
           $this->room = false;
           $this->villa = false;

        }if($this->area){
            $this->message =$this->area;
            
         }
        else if($this->type === "villa"){
            $this->villa = true;
            $this->apartments = false;
            $this->room = false;
         }
         else if($this->type === 'room'){
            $this->villa = false;
            $this->apartments = false;
            $this->room = true;
         }
         $districts = $filters->all();
         $streets = $filterstreet->all();
        $v =$this->villa;
        $a =$this->apartments;
        $r =$this->room;
        $messag ='';
        if($this->messages){

            $messag = "donesssssssssssssssssssssssss";
        }


        $m = $this->type;
        $this->alart = false;
        $f = $this->alart;
        
        return  view('livewire.owner.property.property',
        compact('messag','v','a','r','m','f','cities','districts',"streets"))
        ->layout("layouts.owner-layout",["title"=>"Property Form"]);
    }

}
