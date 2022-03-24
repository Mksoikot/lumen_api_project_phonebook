<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class phonebookController extends Controller
{
    function onInsert(Request $request){
       $one= $request->input('one');
       $two= $request->input('two');
       $name= $request->input('name');
       $email= $request->input('email');

       
    }
    function onSelect(){

    }
    function onDelete(){

    }
    function onUpdate(){

    }
}
