<?php 

namespace App\Traits;


use Illuminate\Http\JsonResponse;


trait ApiResponseTrait{

    public static function success(
         string $message,
         mixed $data=[],
         int $code=200,
         array $meta=[]

    ):JsonResponse{
        return response()->json([
              "status"=>"success",
              "message"=>$message,
              "code"=>$code,
              "data"=>$data,
              "meta"=>$meta,
              "error"=>[]
        ],$code);
    }
    public static function error(
         string $message,
         mixed $data=[],
         int $code=400,
         array $meta=[]

    ):JsonResponse{
        return response()->json([
              "status"=>"error",
              "message"=>$message,
              "code"=>$code,
              "data"=>$data,
              "meta"=>$meta,
              "error"=>[]
        ],$code);
    }
}