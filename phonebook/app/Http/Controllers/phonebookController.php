<?php

namespace App\Http\Controllers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use App\Models\phonebookModel;
class phonebookController extends Controller
{
    function onInsert(Request $request){

        $token= $request->input('access_token');
        $key= env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array=(array)$decoded;

        $user= $decoded_array['user'];
        $one= $request->input('one');
        $two= $request->input('two');
        $name= $request->input('name');
        $email= $request->input('email');


        $result= phonebookModel::insert([
            'username'=>$user,
            'phn_number_one'=>$one,
            'phn_number_two'=>$two,
            'name'=>$name,
            'email'=>$email,
        ]);
        if($result==true){
            return 'Data Insert Successfull';
        }else{
            return 'Insert Fail ! Try Again';
        }


     return ;


    }
    function onSelect(Request $request){
        $token= $request->input('access_token');
        $key= env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array=(array)$decoded;
        $user= $decoded_array['user'];
        $result= phonebookModel::where('username',$user)->get();
        return $result;

    }
    function onDelete(Request $request){
        $email= $request->input('email');
        $token= $request->input('access_token');
        $key= env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array=(array)$decoded;
        $user= $decoded_array['user'];
        $result= phonebookModel::where(['username'=>$user,'email'=>$email])->delete();

        if($result==true){
            return 'Delete Successfully';
        }else{
            return 'Delete Fail ! Try Again';
        }


    }
    function onUpdate(Request $request){
        // $one= $request->input('phn_number_one');
        // $two= $request->input('phn_number_two');
        // $name= $request->input('name');
        // $token= $request->input('access_token');
        // $key= env('TOKEN_KEY');
        // $decoded = JWT::decode($token, new Key($key, 'HS256'));
        // $decoded_array=(array)$decoded;
        // $user= $decoded_array['user'];
        // $result= phonebookModel::where('username',$user)->Update(['phn_number_one'=>$one,'phn_number_two'=>$two,'name'=>$name,'email'=>$email]);
        // if($result==true){
        //     return 'Data Update Successfully';
        // }else{
        //     return 'Update Fail ! Try Again';
        // }
    }
}