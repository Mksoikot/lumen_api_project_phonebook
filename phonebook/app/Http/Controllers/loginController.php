<?php

namespace App\Http\Controllers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use App\Models\registationModel;

class loginController extends Controller
{
    // function tokenTest(){
    //     return 'Token Is Ok';
    // }


    function onLogin(Request $request){
       $username= $request->input('username');
       $password= $request->input('password');
       $userCount = registationModel::where(['username'=>$username,'password'=>$password])->count();

       if($userCount==1){
        $key = env('TOKEN_KEY');
        $payload = array(
            "site" => "http://demo.com",
            "user" => $username,
            "iat" => time(),
            "exp" => time()+120
        );
        $jwt = JWT::encode($payload, $key, 'HS256');

        return response()->json(['Token'=>$jwt,'Status'=>'Login Success']);


       }else{
           return 'Worng Username Or password';
       }
  }

}