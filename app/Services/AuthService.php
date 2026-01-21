<?php 
namespace App\Services;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Exceptions\InvalidCredenailsException;
class AuthService{
   public function login(string $email,string $password):array{
      
      // try{
         $user = User::where("email",$email)->first();
        if (! $user || ! Hash::check($password, $user->password)) {
            throw new InvalidCredenailsException();
          }
          $token = $user->createToken("api_token")->plainTextToken;
          return [
            "token"=>$token,
            "role"=>$user->role,
            "email"=>$user->email,
          ];
      // }catch(\Throwable $e){
      //     throw new InvalidCredenailsException();
      // }
    }
    public function register(array $data,UploadedFile $userlogo=null):User{
      
       try{
           DB::bigenTransction();
           if($userlogo){
              $image = $userlogo->store("user_profiles","public");
              $data["profile_photo_url"] = $image;
           }
          $user = User::create([
                  "name"=>$data["name"],
                  "email"=>$data["email"],
                  "role"=>$data["role"],
                  "password"=>Hash::make($data["password"]),
           ]);
           //make sure that User is Owner User
           //commented untill we create owner table
        //    if(isset($data['role_id']) && $data['role'] == "owner"){
             
           
        //    }
           DB::commit();
         return $user;
       }catch(\Throwable $e){
        DB::rollBack();
        report($e);
        return new InvalidCredenialsException();
       }
    }
}
