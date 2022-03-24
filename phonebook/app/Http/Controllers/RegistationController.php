<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registationModel;

class RegistationController extends Controller
{
    function onRegister(Request $request)
    {

        // dd($request->all());

        $result = ([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'city' => $request->input('city'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'gender' => $request->input('gender')
        ]);

        $userCount = registationModel::where('username', $request->input('username'))->count();

        if ($userCount != 0) {
            return "User Alredy Exists";
        } else {
            $data = registationModel::insert($result);
        }

        if ($data == true) {
            return 'Registation Successful';
        } else {
            return 'Registation Fail! Try Again';
        }
    }
}