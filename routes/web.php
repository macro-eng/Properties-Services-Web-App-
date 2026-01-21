<?php
use App\Livewire\Property\ListProperty;
use App\Livewire\Property\PropertyFilter;
use App\Livewire\RoomForm;
use App\Livewire\Company;
use App\Livewire\Owner;
use App\Livewire\propertyForm;
use App\Livewire\Property\ApartmentCreate;
use App\Livewire\Property\VillaForm;
use App\Livewire\Property\PropertyDetails;
use App\Http\Middleware\RoleMiddleware;
use App\Livewire\Property\OwnerForm;
use App\Livewire\Property\Mybookings;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Resources\PropertyResources;
// use App\Http\Controllers\LoginController;
Route::get('api/property',function(){
    return PropertyResources::collection(Property::all());
});
Route::get('/', function () {

    return view('welcome');
});

// Route::get('/table',RoomForm::class);
// Route::get('/apartment',ApartmentCreate::class);
Route::get('/property',PropertyFilter::class)->name("property");#->middleware(["auth","role:tanant"]);
Route::prefix("property")->group(function(){
    Route::get('/form',OwnerForm::class);
    Route::get('/mybooking',Mybookings::class);
    Route::get('/form/{id}',[Mybookings::class,'navigate']);
    Route::get('/{id}',[PropertyDetails::class,"render"]);

});
Route::prefix("/owner")->group(function(){
    Route::get('/dashboard',Owner\Dashboard::class);
    Route::get('/company',Owner\Company::class);
    Route::get('/bookings',[Owner\Services::class,'bookings']);
    Route::get('/payments',[Owner\Services::class,'payments']);
    Route::get('/profile',[Owner\Dashboard::class,'profile']);
    Route::get('/services',Owner\Services::class) ;
    Route::get('/property/create',Owner\Property\Property::class);
    Route::get('/property/list',[Owner\Property\Property::class,"propertylist"]);

});
Route::prefix("/company")->group(function(){
    Route::get('/dashboard',Company\Dashboard::class);
    Route::prefix("profile")->group(function (){
        Route::get('/',Company\Profile::class);
        Route::get('/list',[Company\Profile::class,"list"]);
    });
    Route::get('/requests',Company\Requests::class);

    Route::prefix("/services")->group(function (){
        Route::get('/',Company\Service::class);
        Route::get('/list',[Company\Service::class,"list"]);
        Route::get('/report',[Company\Service::class,"report"]);
    });

    Route::get('/payments',Company\Payment::class);
    Route::get('/contracts',Company\Contacts::class);

});

Route::get('/villa',VillaForm::class)->name("villa")->middleware(["auth","role:owner"]);

Route::get('/redirect-user',function(){
    $user = auth()->user();
    if($user->role === 'tanant'){
        return redirect()->route("property");
    }else if($user->role === 'owner'){
        return redirect()->route("villa");
    }else {
        return redirect("/admin");
    }
})->middleware(["auth"]);
Route::get('/user',function (Request $request){
    return $request->user();
})->name("user")->middleware(["auth","role:tanant"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
