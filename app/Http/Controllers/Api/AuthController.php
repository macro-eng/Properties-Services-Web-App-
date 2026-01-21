<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\ApiException;
use Illuminate\Http\JsonResponse;
use App\Services\AuthService;
use App\Traits\ApiResponseTrait;
class AuthController extends Controller
{
    use ApiResponseTrait;
    public $authService;
    public function __construct(AuthService $authServices){
         $this->authService = $authServices;
    }
    public function login(Request $request):JsonResponse{
        // try{
            $user = $this->authService->login($request->email,$request->password);
            return self::success(
                message:"تم تسجيل الدخول بنجاح",
                data:[
                    "token"=>$user["token"],
                    "role"=>$user["role"],
                    "user"=>$user["email"]
                ],
                code:201,

            );
        // }catch(ApiException $e){
        //    return self::error(
        //     message:$e->getMessage(),
        //     code:$e->getCode()
        //    );
        // } catch(\Throwable $e){
        //     return self::error(
        //         message :"خطا غير متواقع من السيرفر",
        //         code :500,
        //     );
        // }

    }
    public function register(Request $request){
        try{
            $user = $this->authService->register($request->validated());
            return self::success();
        }catch(ApiException $e){
            return self::error(
                message:$e->getMessage(),
                code:$e->getCode()
            );
        }catch(\Throwable $e){
            return self::error(
                message :"خطا غير متواقع من السيرفر",
                code :500,
            );
        }


    }

}
