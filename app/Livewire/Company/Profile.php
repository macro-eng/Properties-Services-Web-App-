<?php

namespace App\Livewire\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Company;


 

class Profile extends Component
{   

    use WithFileUploads;

    // بيانات المستخدم
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;
    public $user_role = 'tanant';
    public $profile_photo;

    // بيانات الشركة
    public $company_name;
    public $company_status = 'accepted';
    public $company_services = [];

    public $company;

    public function mount($company = null)
    {
        if ($company) {
            $this->company = $company;
            $this->user_id = $company->user_id;
            $this->user_name = $company->user->name;
            $this->user_email = $company->user->email;
            $this->user_role = $company->user->role;
            $this->profile_photo = $company->user->profile_photo_path;

            $this->company_name = $company->name;
            $this->company_status = "accepted";
            $this->company_services = $company->services ?? [];
        }
    }

    protected $rules = [
        'user_name' => 'required|string|max:255',
        'user_email' => 'required|email|max:255',
        'user_password' => 'nullable|min:6',
        'user_role' => 'required|in:tanant,owner,admin,visitor',
        'profile_photo' => 'nullable|image|max:1024', // صورة ≤ 1MB
        'company_name' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        // حفظ أو تحديث المستخدم
        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->user_name,
                'email' => $this->user_email,
                'role' => $this->user_role,
                'password' => $this->user_password ? bcrypt($this->user_password) : $user->password,
            ]);
        } else {
            $user = User::create([
                'name' => $this->user_name,
                'email' => $this->user_email,
                'role' => $this->user_role,
                'password' => bcrypt($this->user_password),
            ]);
        }

        // رفع الصورة إذا تم اختيارها
        if ($this->profile_photo instanceof \Livewire\TemporaryUploadedFile) {
            $path = $this->profile_photo->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
            $user->save();
        }

        // حفظ بيانات الشركة
        if (!$this->company) {
            $company = new Company();
            $company->user_id = $user->id;
        } else {
            $company = $this->company;
        }

        $company->name = $this->company_name;
        $company->status = $this->company_status;
        $company->services = $this->company_services;
        $company->save();

        session()->flash('message', 'تم حفظ بيانات الشركة والمستخدم بنجاح!');
        return redirect()->route('company/profile/list');
       }


 
    public function list()
    {   $com = Company::find(1);
        return view('livewire.company.profile.profile-list',compact("com"))->layout("layouts.company-layout",["title"=>"لوحة التحكم"]);
    } public function render()
    {   
        return view('livewire.company.profile.profile')->layout("layouts.company-layout",["title"=>"لوحة التحكم"]);
    }
}
