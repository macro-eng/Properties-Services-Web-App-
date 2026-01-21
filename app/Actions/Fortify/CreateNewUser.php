<?php

namespace App\Actions\Fortify;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {  $tanant = Role::select(["name"])->where('name','tanant')->get()[0];
       $owner = Role::select(["name"])->where('name','owner')->get()[0];
       $visitor = Role::select(["name"])->where('name','visitor')->get()[0];
       if(!$tanant){
          $tanant = Role::create(["name"=>"tanant"]);
          if(!$tanant->hasRole('tanant')){
                $tanant->givePermissionTo(
                  [
                  'view-any Property',
                  'view-any villaDetails',
                  'view-any roomDetails',
                  'view-any apartmentDetails',
                  'create City',
                  'view-any District',
                  'view User',
                  'view-any Booking',
                  'update Booking',
                  'create Booking',
                  'edit User',
                  ]);
             }

       }else if(!$owner){
          $owner = Role::create(["name"=>"owner"]);

       }else if (!$visitor) {
          $visitor = Role::create(["name"=>"visitor"]);
       }
       

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'in:owner,tanant,"visitor'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
        ]);
        if($input['role'] === 'tanant')
        {
         $user->assignRole('tanant');
        }
        else if($input['role']==='visitor'){
         $user->assignRole('');

        }else if($input['role']==='owner'){
         $user->assignRole('owner');
        }
        return user;
    }
}
