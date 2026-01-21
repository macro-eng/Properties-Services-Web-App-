<?php 
namespace App\Services\Service;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Exceptions\InvalidCredenailsException;
use App\Models\Service;
class Service{
    public function insert(array $data):array
    {
        DB::beginTransaction();
        try{
            if($data){
                 Service::create([
                    "name"=>$data->name,
                    ""
                 ])
            }

        }catch(\Throwable $e){
            DB::rollback();
        }
    }
}