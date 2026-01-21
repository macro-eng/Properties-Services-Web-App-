<?php

namespace App\Livewire\Company;
use Livewire\Component;
use App\Models\Company;
use App\Models\Service as S;
class Service extends Component
{
    public $services = [];
    public $title;
    public $description;
    public $price;
    public $frequency;
    public $service;
 
    protected $rules = [
        'title' => 'required|string',
        'frequency' => 'required|in:monthly,yearly,weekly,on-time',
        'price' => 'required|int', // صورة ≤ 1MB
        'description' => 'nullable|string|max:255',
    ];
    public function mount(S $service)
    {    if($service){
        $this->service = $service;
        $this->title = $service->title;
        $this->description = $service->description;
        $this->frequency = $service->frequency;
        $this->price = $service->price;
       }
    }

    // public function addService()
    // {
    //     $this->services[] = [
    //         'title' => '',
    //         'price' => '',
    //         'description' => '',
    //         'frequency' => 'daily',
    //     ];
    // }

    // public function removeService($index)
    // {
    //     unset($this->services[$index]);
    //     $this->services = array_values($this->services);
    // }

    public function save()
    {   
         $this->validate();
        if(!$this->service){
             $service=new S();
        }else{
            $service = $this->service;
        }
         $service->title = $this->title;
         $service->company_id = 1;
         $service->price = $this->price;
         $service->description = $this->description;
         $service->frequency = $this->frequency;
         $service->save();

        session()->flash('message', 'تم حفظ الخدمات بنجاح!');
        return redirect()->route("company/services/list");
    }
    public function list()
    {  
         $coms = S::where("company_id",1)->get();
        return view('livewire.company.services.index',compact('coms'))
        ->layout("layouts.company-layout",["title"=>" الخدمات"]);
    }
    public function report(){

        return view('livewire.company.services.report')
        ->layout("layouts.company-layout",["title"=>"تقرير العملاء"]);
    }
    public function render()
    {
        return view('livewire.company.services.create')->layout("layouts.company-layout",["title"=>"الخدمات"]);
    }
}
